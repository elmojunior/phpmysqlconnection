const peopleApi = new PeopleApi('./Pessoas.php');

// Log
peopleApi.getAll()
  .then(data => console.log(data))
  .catch(error => console.error(error));

// Table
const tableBody = document.querySelector('#peopleTable tbody');
peopleApi.getAll()
  .then(data => {
    data.forEach(person => {
      const row = document.createElement('tr');

      const nameCell       = document.createElement('td');
      nameCell.textContent = person.nome;
      row.appendChild(nameCell);

      const ageCell       = document.createElement('td');
      ageCell.textContent = person.idade;
      row.appendChild(ageCell);

      tableBody.appendChild(row);
    });
  })
  .catch(error => console.error(error));
