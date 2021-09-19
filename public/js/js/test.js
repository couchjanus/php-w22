let ul = document.createElement('ul');
// console.dir(ul);
// console.log(typeof ul);

let app = document.getElementById('app');

for (let i = 0; i<7; i++){
    let li = document.createElement('li');
    li.textContent = 'Create item ' + (i+1);
    ul.append(li);
}

app.append(ul);
