//========================================================================================
// Routing
const page = window.location.href.split('/').at(-1)
const email = window.localStorage.getItem('email')

if ((!email && page == 'index.php') || (!email && page == '')) {
    window.location.href = "http://project/pages/authorization/authorization.php";
}

//========================================================================================
// Registration
const registrationForm = document.forms.registration;
if (registrationForm) {
    registrationForm.addEventListener('submit', (event) => {
        event.preventDefault()

        // создаём объект FormData, передаём в него элемент формы
        const formData = new FormData(registrationForm);
        const EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;

        const email = formData.get('email');
        const password = formData.get('password');
        const address = formData.get('address');
        const name = formData.get('name');
        const surname = formData.get('surname');
        const user = { name, surname, address, email, password }

        if (email === '' || password === '') return
        if (!EMAIL_REGEXP.test(email)) return

        registrationForm.reset()
        registration(user).then(data => {
            if (data.result == true) {
                for (const [key, value] of Object.entries(data)) {
                    if (key === 'result') continue;
                    window.localStorage.setItem(key, value)
                }
                window.location.href = "http://project/";
            }
        })
    })
}

const registration = async (user) => {
    const url = "http://project/services/registration.php/"

    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(user)
    });

    const info = await response.json()
    return info
}


//========================================================================================
// Login
const loginForm = document.forms.login;
if (loginForm) {
    loginForm.addEventListener('submit', (event) => {
        event.preventDefault()

        // создаём объект FormData, передаём в него элемент формы
        const formData = new FormData(loginForm);
        const EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;

        const email = formData.get('email');
        const password = formData.get('password');

        if (email === '' || password === '') return
        if (!EMAIL_REGEXP.test(email)) return

        console.log({email, password});

        loginForm.reset()
        login({ email, password }).then(data => {
            console.log(data)
            if (data.result == true) {
                for (const [key, value] of Object.entries(data)) {
                    if (key === 'result') continue;
                    console.log(key, value)
                    window.localStorage.setItem(key, value)
                }
                window.location.href = "http://project/";
            }
        }).catch(ex => console.log(ex))
    })
}

const login = async (user) => {
    console.log(user)
    const url = "http://project/services/login.php/"

    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(user)
    });

    const info = await response.json()
    return info
}


// Modal =================================================================================
const modals = document.querySelectorAll('[data-name]')
const modalButtons = document.querySelectorAll('button[data-for]')

modalButtons.forEach(button => {
    const modalName = button.getAttribute('data-for')
    const modal = Array.from(modals).find(element => element.getAttribute('data-name') === modalName)

    if (!modal) return;

    const closeButton = modal.querySelector('button.task-form__actions_close')
    const confirmButton = modal.querySelector('button.task-form__actions_confirm')


    button.addEventListener('click', () => {
        modal.classList.add('active')
    })

    modal.addEventListener('click', (event) => {
        if (event.target === modal || event.target === closeButton) {
            modal.classList.remove('active')
        }
    })

    confirmButton?.addEventListener('click', sendFormHandler)
})


function sendFormHandler(event) {
    event.preventDefault()

    const form = event.target.form;

    switch (form.name) {
        case 'add-task':
            addTask(form)
            break;
        case 'add-category':
            addCategory(form)
            break;
        default:
            break;
    }
}

function addCategory(form) {
    // создаём объект FormData, передаём в него элемент формы
    const formData = new FormData(form);

    const title = formData.get('title');
    const color = formData.get('color');

    createCategory({ title, color }).then(data => {
        console.log('Новая категория успешно добавлена)')
        console.log(data)
        form.reset()
    }).catch(console.log).finally(() => {
        modals.forEach(modal => {
            modal.classList.remove('active')
        })
    })
}

async function createCategory(task) {
    const url = "http://project/services/create-category.php"

    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(task)
    });

    const info = await response.json()
    return info
}

function addTask(form) {
    // создаём объект FormData, передаём в него элемент формы
    const formData = new FormData(form);

    const title = formData.get('title');
    const deadline = formData.get('deadline');
    const categoryId = form.querySelector('.select__item').getAttribute('data-value')

    createTask({ title, deadline, categoryId }).then(data => {
        console.log('Новая задача успешно добавлена)')
        console.log(data)
        form.reset()
    }).catch(console.log).finally(() => {
        modals.forEach(modal => {
            modal.classList.remove('active')
        })
    })
}

async function createTask(task) {
    const url = "http://project/services/create-task.php/"

    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(task)
    });

    const info = await response.json()
    return info
}



//========================================================================================
// Menu links
const pageLinks = document.querySelectorAll('a.info-list__link');
const logout = document.querySelectorAll('.logout');

logout.forEach(item => item.addEventListener('click', () => localStorage.clear()))

pageLinks.forEach(linkElem => {
    const link = linkElem.getAttribute('href').split('/').at(-1)
    const url = window.location.href.split('/').at(-1)

    if (link === url) {
        pageLinks.forEach(button => button.classList.remove('active'))
        linkElem.classList.add('active')
    }

    linkElem.addEventListener('click', (event) => {
        if (link === url) {
            event.preventDefault();
        }

        pageLinks.forEach(button => button.classList.remove('active'))
        linkElem.classList.add('active')
    })
});

//========================================================================================
// Change category to create a task
const selects = document.querySelectorAll('.select')
selects.forEach(select => {
    const activeItem = select.querySelector('.select__item');
    const optionList = select.querySelector('.option-list');
    const options = optionList.querySelectorAll('.option');

    activeItem.addEventListener('click', () => {
        changeClassActive('toggle', activeItem, optionList)
    })

    options.forEach((option, index) => {
        const optionValue = option.getAttribute('data-value');
        const optionContent = option.querySelector('.option__title').textContent;

        if (index === 0) {
            activeItem.setAttribute('data-value', optionValue)
            activeItem.querySelector('.option__title').textContent = optionContent
        }

        option.addEventListener('click', () => {
            const activeValue = activeItem.getAttribute('data-value');

            if (optionValue === activeValue) {
                changeClassActive('remove', activeItem, optionList)
                return
            }
            activeItem.setAttribute('data-value', optionValue)
            activeItem.querySelector('.option__title').textContent = optionContent
            changeClassActive('remove', activeItem, optionList)
        })
    })
})

function changeClassActive(option, ...items) {
    switch (option) {
        case 'add':
            items.forEach(item => item.classList.add('active'))
            break;
        case 'remove':
            items.forEach(item => item.classList.remove('active'))
            break;
        case 'toggle':
            items.forEach(item => item.classList.toggle('active'))
            break;
        default: break;
    }
}

//========================================================================================
// Toggle active tasks
const checkList = document.querySelectorAll('.event__item_check')

checkList.forEach(checkItem => {
    checkItem.addEventListener('click', () => {
        checkItem.classList.toggle('done')
    })
})