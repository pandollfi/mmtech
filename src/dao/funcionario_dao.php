<?php


class FuncionarioDao
{

    private $db;

    public function __construct()
    {
        require_once(RAIZ . 'src/db/classe_db.php');
        $this->db = new Database();
    }

    public function inserir(Funcionario $funcionario)
    {
        $this->db->connect();
        return $this->db->insert('funcionarios_tbl', $funcionario->getArray());
    }

    public function editar(Funcionario $funcionario, $id)
    {
        $where = "id = " . $id;
        $this->db->connect();
        return $this->db->update('funcionarios_tbl', $funcionario->getArray(), $where);
    }

    public function carrega_funcionarios($condicao = null)
    {
        $this->db->connect();
        $query = 'SELECT * FROM funcionarios_tbl ORDER BY id ';
        $resultado = $this->db->fetch_all($query);
        return $resultado;
    }

    public function lista_funcionarios_tabela()
    {
        $option = null;
        $resultado = $this->carrega_funcionarios();
        if (empty($resultado)) {
            $option .= "<div class='card-body'>
                            <div class='d-flex justify-content-center'>Nenhum resultado encontrado...</div>
                        </div>";
        } else {
            $option .= "<div class='card-body'>
                    <table class='table table-hover table-bordered results'>
                        <thead>
                            <tr>
                                <th class='col-md-1'>ID</th>
                                <th class='col-md-4'>Nome</th>
                                <th class='col-md-2'>Email</th>
                                <th class='col-md-3'>Telefone</th>
                                <th class='col-md-3'>Situação</th>
                                <th class='col-md-3'>Ações</th>
                            </tr>
                        </thead>
                  ";
            $option .= "<tbody>";
            foreach ($resultado as $result) {
                $id_encode = base64_encode($result['id']);
                $situacao = $result['ativo'] == 1 ? "<span style='color:blue'><b>Ativo</b></span>" : "<span style='color:red'><b>Inativo</b></span>";
                $option .= "<tr>
                            <th class='col-md-1'>" . $result['id'] . "</th>
                            <td class='col-md-5'>" . $result['nome'] . "</td>
                            <td class='col-md-2'>" . $result['email'] . "</td>
                            <td class='col-md-3'>" . $result['telefone'] . "</td>
                            <td class='col-md-3'>" . $situacao . "</td>
                            <th class='col-md-3'><a href='editar_funcionario.php?i=" . $id_encode . "'>Editar</a></th>
                        </tr>";
            }
            $option .= "</tbody>
                     </table>
                </div>";
        }

        return $option;
    }
}
