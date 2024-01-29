// Inicializa Firebase con tu configuración
firebase.initializeApp({
    apiKey: "AIzaSyC3uGG6P3e1wixES3tUCd3AjH6pYNZL_Qs",
    authDomain: "playreserve-4eb0a.firebaseapp.com",
    projectId: "playreserve-4eb0a"
  });
  
  // Crea una referencia a la base de datos Firestore
  var db = firebase.firestore();
  var auth = firebase.auth();

  
  // Ahora puedes continuar con tu código para agregar datos a la colección "Usuarios"
  function guardar(){
    var nombres= document.getElementById('nombres').value;
    var appaterno= document.getElementById('appaterno').value;
    var apmaterno= document.getElementById('amaterno').value;
    var dni= document.getElementById('dni').value;
    var correo= document.getElementById('correo').value;
    var direccion= document.getElementById('direccion').value;
    var tipoUsuario= document.getElementById('tipoUsuario').value;
    var usuario= document.getElementById('usuario').value;
    var contraseña= document.getElementById('pass').value;

    auth.createUserWithEmailAndPassword(`${usuario}@playreserva.com`, contraseña)
    .then((userCredential) => {
        const uid = userCredential.user.uid;

        console.log('Usuario registrado en Authentication:', userCredential);
    if(uid){

    db.collection("Usuarios").doc(uid).set({
        amaterno: apmaterno,
        apaterno: appaterno,
        correo: correo,
        direccion: direccion,
        dni: dni,
        fotousuario: null,
        idClub: null,
        idCuenta: null,
        idTipoUsuario: parseInt(tipoUsuario),
        idUsuario: uid,
        nombre: nombres,
        pass: contraseña,
        username: usuario
      })
        .then((docRef) => {
          document.getElementById('nombres').value='';
          document.getElementById('appaterno').value='';
          document.getElementById('amaterno').value='';
          document.getElementById('dni').value='';
          document.getElementById('correo').value='';
          document.getElementById('direccion').value='';
          document.getElementById('tipoUsuario').value='';
          document.getElementById('usuario').value='';
          document.getElementById('pass').value='';
        })
        .catch((error) => {
          console.error("Error adding document: ", error);
        });
    }else{
        console.error("Error: uid no obtenido al crear usuario");
    }
    })
    .catch((error) => {
      // Manejo de errores al registrar el usuario
      var errorCode = error.code;
      var errorMessage = error.message;
      console.error("Error al registrar usuario en Authentication:", errorMessage);
    });
  }

  async function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    
    try {
        const userDoc = await db.collection('Usuarios').where('username', '==', username).where('pass', '==', password).where('idTipoUsuario','==',3).get();
        if (userDoc.empty) {
            alert('Nombre de usuario o contraseña incorrectos');
        } else {
            // Usuario autenticado con éxito
            // Redirige a tu página index.html
            //window.location.href = 'index.php';
            const form = document.createElement("form");
            form.method = "post";
            form.action = "";

            const passwordInput = document.createElement("input");
            passwordInput.type = "hidden";
            passwordInput.name = "usuario";
            passwordInput.value = "usuariologeado";
            form.appendChild(passwordInput);


            document.body.appendChild(form);
            form.submit();
        }
    } catch (error) {
        console.error('Error al autenticar usuario:', error);
    }
}

function cerrarSesion() {
    auth.signOut()
        .then(() => {
            // La sesión se cerró con éxito
            console.log("Sesión cerrada correctamente");
            // Redirigir a la página de inicio de sesión (login.html)
            window.location.href = "logout.php";
        })
        .catch((error) => {
            // Ocurrió un error al cerrar la sesión
            console.error("Error al cerrar sesión", error);
        });

}




  //Leer datos
  var tabla=document.getElementById('tabla');
  db.collection("Usuarios").onSnapshot((querySnapshot) => {
    tabla.innerHTML='';
    querySnapshot.forEach((doc) => {
        console.log(`${doc.id} => ${doc.data()}`);
        tabla.innerHTML+= `
        <tr>
        <td>${doc.data().nombre}</td>
        <td>${doc.data().apaterno}</td>
        <td>${doc.data().amaterno}</td>
        <td>${doc.data().dni}</td>
        <td>${doc.data().correo}</td>
        <td>${doc.data().direccion}</td>
        <td>${doc.data().idTipoUsuario}</td>
        <td>${doc.data().username}</td>
        <td>${doc.data().pass}</td>
        <td><button class="btn btn-danger" onclick="eliminar('${doc.id}')">Eliminar</button></td>
        <td><button class="btn btn-warning" onclick="editar('${doc.id}','${doc.data().nombre}','${doc.data().apaterno}',
        '${doc.data().amaterno}','${doc.data().dni}','${doc.data().correo}','${doc.data().direccion}','${doc.data().idTipoUsuario}',
        '${doc.data().username}','${doc.data().pass}')">Editar</button></td>
        

        </tr> 
        `
    });
});

//Borrar documentos
function eliminar(id){
    db.collection("Usuarios").doc(id).delete().then(() => {
        console.log("Document successfully deleted!");
    }).catch((error) => {
        console.error("Error removing document: ", error);
    })
} 

//Actualizar documento

function editar(id,nombres,appaterno,apmaterno,dni,correo,direccion,tipoUsuario,usuario,contraseña){

document.getElementById('nombres').value=nombres;
document.getElementById('appaterno').value=appaterno;
document.getElementById('amaterno').value=apmaterno;
document.getElementById('dni').value=dni;
document.getElementById('correo').value=correo;
document.getElementById('direccion').value=direccion;
document.getElementById('tipoUsuario').value=tipoUsuario;
document.getElementById('usuario').value=usuario;
document.getElementById('pass').value=contraseña;

var boton=document.getElementById('boton');
boton.innerHTML="Editar";

boton.onclick=function(){
    var washingtonRef = db.collection("Usuarios").doc(id);

    // Set the "capital" field of the city 'DC'
    var nombres= document.getElementById('nombres').value;
    var appaterno= document.getElementById('appaterno').value;
    var apmaterno= document.getElementById('amaterno').value;
    var dni= document.getElementById('dni').value;
    var correo= document.getElementById('correo').value;
    var direccion= document.getElementById('direccion').value;
    var tipoUsuario= parseInt(document.getElementById('tipoUsuario').value);
    var usuario= document.getElementById('usuario').value;
    var contraseña= document.getElementById('pass').value;

    return washingtonRef.update({
        amaterno: apmaterno,
        apaterno: appaterno,
        correo: correo,
        direccion: direccion,
        dni: dni,
        idTipoUsuario: parseInt(tipoUsuario),
        nombre: nombres,
        pass: contraseña,
        username: usuario
    })
    .then(() => {
        console.log("Document successfully updated!");
        document.getElementById('nombres').value='';
        document.getElementById('appaterno').value='';
        document.getElementById('amaterno').value='';
        document.getElementById('dni').value='';
        document.getElementById('correo').value='';
        document.getElementById('direccion').value='';
        document.getElementById('tipoUsuario').value='';
        document.getElementById('usuario').value='';
        document.getElementById('pass').value='';
        boton.innerHTML='Guardar';
    })
    .catch((error) => {
        // The document probably doesn't exist.
        console.error("Error updating document: ", error);
    });

}

}

function guardarClub(){
    var nombre= document.getElementById('nombre').value;
    var descripcion= document.getElementById('descripcion').value;
    var ruc= document.getElementById('ruc').value;
    var telefono= document.getElementById('telefono').value;
    var correo= document.getElementById('correo').value;
    var direccion= document.getElementById('direccion').value;


    db.collection("Clubs").add({
        correo: correo,
        descripcion:descripcion,
        direccion: direccion,
        fotousuario: null,
        idClub: "1221122121",
        idUsuario: "eksvYrEL5DgV2JhoahvYtHxQWEr2",
        nombreClub: nombre,
        ruc: ruc,
        telefono: telefono
      })
        .then((docRef) => {
          document.getElementById('nombre').value='';
          document.getElementById('descripcion').value='';
          document.getElementById('ruc').value='';
          document.getElementById('telefono').value='';
          document.getElementById('correo').value='';
          document.getElementById('direccion').value='';
        })
        .catch((error) => {
          console.error("Error adding document: ", error);
        });
    }


    
  