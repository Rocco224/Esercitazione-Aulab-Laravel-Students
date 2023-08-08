import './bootstrap';
import 'bootstrap';

const deleteButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
const deleteForm = document.querySelector('#deleteForm');

for(let deleteButton of deleteButtons) {

    deleteButton.addEventListener('click', e => {

        const action = e.target.getAttribute('data-action');

        deleteForm.setAttribute('action', action);

    });

};

const Turbolinks = require("turbolinks");
Turbolinks.start();