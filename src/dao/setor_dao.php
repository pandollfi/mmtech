<?php


class SetorDao
{

    private $id_funcionario;
    private $id_setor;

    public function __construct()
    {
        require_once(RAIZ . 'src/db/classe_db.php');
        $this->db = new Database();
    }


    public function carrega_setores_lista($condicao = null)
    {
        $option = null;
        $this->db->connect();
        $query = 'SELECT * FROM setores_tbl';
        $resultado = $this->db->fetch_all($query);
        if (!empty($resultado)) {
            foreach ($resultado as $result) {
                $option .= "<option
             value=" . $result['id'] . ">" . $result['descricao'] . "</option>";
            }
        } else {
            $option = "<option value='' disabled> Não há setores cadastradas! </option>";
        }
        return $option;
    }


    public function inserir(Setor $setor)
    {
        $this->db->connect();
        return $this->db->insert('setores_tbl', $setor->getArraySetor());
    }

    public function atribuirSetor($setor, $id_funcionario)
    {
        $this->db->connect();
        $dados = [
            "id_setores" => intval($setor),
            "id_funcionarios" => intval($id_funcionario)
        ];
        return $this->db->insert('funcionario_setores_tbl', $dados);
    }



    public function getId_funcionario()
    {
        return $this->id_funcionario;
    }

    public function setId_funcionario($id_funcionario)
    {
        $this->id_funcionario = $id_funcionario;

        return $this;
    }


    public function getId_setor()
    {
        return $this->id_setor;
    }


    public function setId_setor($id_setor)
    {
        $this->id_setor = $id_setor;

        return $this;
    }


    public function inserir_setor_funcionario(Setor $setor)
    {
        $this->db->connect();
        return $this->db->insert('funcionarios_tbl', $setor->getArraySetorFuncionario());
    }

    public function carrega_setores($condicao = null)
    {
        $this->db->connect();
        $query = 'SELECT * FROM setores_tbl ORDER BY id ';
        $resultado = $this->db->fetch_all($query);
        return $resultado;
    }

    public function lista_setores_tabela()
    {
        $option = null;
        $resultado = $this->carrega_setores();
        if (empty($resultado)) {
            $option .= "<div class='card-body'>
                            <div class='d-flex justify-content-center'>Nenhum resultado encontrado...</div>
                        </div>";
        } else {
            $option .= "<div class='card-body'>
                            <table class='table table-hover table-bordered results'>
                                <thead>
                                    <tr>
                                    <th class='col-md-3'>ID</th>
                                    <th class='col'>Setor</th>
                                    </tr>
                                </thead>
                        ";
            $option .= "<tbody>";
            foreach ($resultado as $result) {
                $option .= "<tr>
                            <th class='col-md-1'>" . $result['id'] . "</th>
                            <td class='col-md-5'>" . $result['descricao'] . "</td>
                        </tr>";
            }
            $option .= "</tbody>
                    </table>
                </div>";
        }
        return $option;
    }
}
