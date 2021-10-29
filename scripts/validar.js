const formSignup = document.getElementById('frm_signup');
const formLogin = document.getElementById('frm_login');
const btnSignup = document.getElementById('enviar-datos');

if(formSignup){
    console.log("formulario de registro")
}else{
    console.log("formulario de inicio de sesion")
}

let timeout = null;

// let errors = {
//     username: true,
//     password: true,
//     confirm_password: true,
// }

var prueba = new Object();
document.querySelectorAll('.campo-entrada').forEach((box)=>{
    const inputBox = box.querySelector('input');
    inputBox.addEventListener('keydown', (Event) =>{
        clearTimeout(timeout);
        timeout = setTimeout(()=>{
            console.log(`input ${inputBox.name} value: `,inputBox.value);
            prueba[inputBox.name] = true;
            console.log(prueba);
            validarDatos(box, inputBox);
        }, 300);
    });
});

validarDatos = (box, inputBox) =>{
    if(inputBox.value == ''){
            mostrarError(true, box, inputBox);
    }else{
            mostrarError(false, box, inputBox);
    }

    if (inputBox.name == 'confirm_password')
    {
        if (document.frm_signup.password.value == inputBox.value){
            mostrarError(false, box, inputBox);
        }else{
            mostrarError(true, box, inputBox);
        }
    }

    // if (inputBox.name == 'password'){
    //     if(inputBox.value.length <= 6 ){
    //         mostrarError(true, box, inputBox);
    //     }else{
    //         mostrarError(false, box, inputBox);
    //     }
    // }
    //enviarDatos();
}

mostrarError = (verificarError, box, inputBox) => {
    if(verificarError){
        box.classList.remove('input-success');
        box.classList.add('input-error');
        prueba[inputBox.name] = true;
        //errors[inputBox.name] = true;
    }else{
        box.classList.remove('input-error');
        box.classList.add('input-success');
        prueba[inputBox.name] = false;
        //errors[inputBox.name] = false;
    }
}

let dealay=null;

function enviar(){
    var verificar =true;
    var cont = 0;
    for (const prop in prueba) {
        cont = cont + 1;
        console.log(`---> ${prop}`)
        if (prueba[prop] === true){
            verificar=true;
        }else{
            verificar=false;
        }
        //console.log(`${prop} = ${obj[prop]}`);
    }
    //if(!errors.username && !errors.password && !errors.confirm_password){
    if(!verificar && cont == 5 && formSignup){
        //console.log(errors);
        console.log("noooo");

        // Swal.fire({
        //     position: 'center',
        //     icon: 'success',
        //     title: 'Su registro fue exitoso',
        //     showConfirmButton: false,
        //     timer: 1500
        // })
        clearTimeout(dealay);
        dealay = setTimeout(()=>{
            document.frm_signup.submit();
        }, 300);

    }else if (!verificar && cont == 2 && formLogin){
        clearTimeout(dealay);
        dealay = setTimeout(()=>{
            document.frm_login.submit();
        }, 300);

    }else{
        console.log("noooo", cont);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Verifique los campos!',
        })
    }
}

window.onload = function(){
    document.getElementById("enviar-datos").onclick = enviar ;
}