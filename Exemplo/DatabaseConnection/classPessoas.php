<?php
  /**
   * Pessoas
   * Esta classe é responsável por acessar e manipular dados da tabela "pessoas" do banco de dados
   * 
   * @author Elmo Júnior <social@elmojunior.com>
   * @license https://opensource.org/license/MIT MIT
   * @link https://github.com/elmojunior/phpmysqlconnection PHP MySQL Connection
   * @package PHPMySQLConnection/Exemplo/DatabaseConnection
   * @version 1.0.0
   * 
   * @method string readAll() realiza uma consulta SELECT na tabela "pessoas" e retorna um array com todos os registros em formato JSON
   */
  class Pessoas extends MySQLConnection{
    
    /**
     * readAll()
     * Este método realiza uma consulta SELECT na tabela "pessoas" e retorna um array com todos os registros em formato JSON
     * 
     * @author Elmo Júnior <social@elmojunior.com>
     * @license https://opensource.org/license/MIT MIT
     * @link https://github.com/elmojunior/phpmysqlconnection PHP MySQL Connection
     * @package DatabaseConnection
     * @version 1.0.0
     * 
     * @return string Um array em formato JSON com todos os registros da tabela "pessoas"
     */
    public function readAll(){
      $query = "SELECT
                  *
                FROM
                  pessoas
              ";

      $result = mysqli_query($this->connection, $query);
      $rows = array();

      while ($row = mysqli_fetch_array($result)){
        $rows[] = array(
          'id'    => $row['id'],
          'nome'  => $row['nome'],
          'idade' => $row['idade']
        );
      }
      return json_encode($rows);
    }
  }
?>
