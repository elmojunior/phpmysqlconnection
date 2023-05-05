/**
 * Pessoas
 * Esta classe é responsável por acessar e manipular dados da tabela "pessoas" do banco de dados
 * 
 * @author Elmo Júnior <social@elmojunior.com>
 * @license https://opensource.org/license/MIT MIT
 * @link https://github.com/elmojunior/phpmysqlconnection PHP MySQL Connection
 * @package PHPMySQLConnection/Exemplo/JavaScript
 * @version 1.0.0
 * 
 * @method string getAll() realiza uma consulta SELECT na tabela "pessoas" e retorna um array com todos os registros em formato JSON
 */


class PeopleApi {
  constructor(endpoint) {
    this.endpoint = endpoint;
  }

  /**
   * getAll()
   * realiza uma consulta SELECT na tabela "pessoas" e retorna um array com todos os registros em formato JSON
   * 
   * @author Elmo Júnior <social@elmojunior.com>
   * @license https://opensource.org/license/MIT MIT
   * @link https://github.com/elmojunior/phpmysqlconnection PHP MySQL Connection
   * @package JavaScript
   * @version 1.0.0
   * 
   * @return string Um array em formato JSON com todos os registros da tabela "pessoas"
   */
  async getAll() {
    const response = await fetch(this.endpoint);
    const data = await response.json();
    return data;
  }
}

