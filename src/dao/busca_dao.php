<?php


class BuscaDao
{

    private $db;

    public function __construct()
    {
        require_once(RAIZ . 'src/db/classe_db.php');
        $this->db = new Database();
    }

    public function busca(Busca $busca)
    {
        $array_palavra = $busca->getArrayBusca();
        $palavra = $array_palavra['busca'];

        $this->db->connect();
        $query = "SELECT fun.id, fun.nome, fun.email, sett.descricao as setor FROM funcionarios_tbl fun
                    left join funcionario_setores_tbl prosett on fun.id = prosett.id_funcionarios
                    left join setores_tbl sett on sett.id = prosett.id_setores
                    where (fun.nome like '%" . $palavra . "%' or fun.email like '%" . $palavra . "%' 
                    or sett.descricao like '%" . $palavra . "%') and fun.ativo = 1
                    group by fun.id order by fun.id asc";
        $busca = $this->db->fetch_all($query);
        return $busca;
    }

    public function trata_retorno_busca($resultados)
    {
        $contador = 0;
        $funcionario = null;
        if (!empty($resultados)) {
            $funcionario[] = '<div class="row">';
            foreach ($resultados as $resultado) {
                $id_encode = base64_encode($resultado['id']);
                $funcionario[] = '<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-arch"></i></div>
                                <h4><a href="funcionario_detalhe.php?i=' . $id_encode . '">' . $resultado['nome'] . '</a></h4>
                                <p>Clique para ver mais sobre o funcionario</p>
                            </div>
                        </div>';
            }
            $funcionario[] = '</div>';
            return $funcionario;
        }
    }


    public function carrega_funcionario_detalhe($id)
    {
        $this->db->connect();
        $query = "SELECT fun.id, fun.nome, fun.telefone, fun.email, fun.ativo
                     FROM funcionarios_tbl fun
                      where fun.id = " . $id;
        $busca = $this->db->fetch_all($query);
        $funcionario = $busca[0];
        $trata_setores = $this->carrega_setor_funcionario_detalhe($funcionario['id']);
        $funcionario['setores'] = $trata_setores;

        return $funcionario;
    }

    public function carrega_setor_funcionario_detalhe($id)
    {
        $setores = null;
        $this->db->connect();
        $query = "SELECT 
                sett.descricao
            FROM
                setores_tbl sett
                    LEFT JOIN
                funcionario_setores_tbl prosett ON sett.id = prosett.id_setores
                    LEFT JOIN 	
                funcionarios_tbl fun on fun.id = prosett.id_funcionarios
                where fun.id = " . $id;
        $busca = $this->db->fetch_all($query);
        foreach ($busca as $setor) {
            $setores .= " " . $setor['descricao'] . ",";
        }
        $setores = substr($setores, 0, -1);

        return $setores;
    }
}
