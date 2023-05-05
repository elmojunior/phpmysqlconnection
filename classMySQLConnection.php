<?php
  /**
   * MySQLConnection
   * Esta classe é responsável por prover a conexão com o banco de dados MySQL e herda os atributos e métodos da classe mysqli para realizar consultas e operações no banco de dados
   * 
   * @author Elmo Júnior <social@elmojunior.com>
   * @license https://opensource.org/license/MIT MIT
   * @link https://github.com/elmojunior/phpmysqlconnection PHP MySQL Connection
   * @package PHPMySQLConnection
   * @version 1.0.0
   * 
   * @method void __construct() cria uma nova instância da classe MySQLConnection e estabelece a conexão com o banco de dados
   */
  class MySQLConnection{
    private   $hostname   = "127.0.0.1"; // endereço do servidor
    private   $username   = "root";      // nome do usuário
    private   $password   = "senha";     // senha de acesso
    private   $Connection = "dados";     // nome do banco de dados
    protected $connection;               // conexão com o banco de dados

    public function __construct(){
      $this->connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->Connection);

      if (!$this->connection){
        die("Não foi possível conectar ao banco de dados: " . mysqli_connect_error());
      }
    }
  }
?>
