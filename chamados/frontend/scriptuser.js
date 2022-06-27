const baseUrl = `//192.168.0.117/backend/`

let modal2 = null
let btnSalvar2 = null

onload = async () => {
    modal2 = new bootstrap.Modal(document.getElementById("exampleModal2"))
    btnSalvar2 = document.getElementById("salvar2")
    btnSalvar2.addEventListener("click", async () => {
        const iduser = document.getElementById("iduser").value
        const nome = document.getElementById("nomeuser").value
        const setor = document.getElementById("setoruser").value
        const problema = document.getElementById("problema").value
        const descricao = document.getElementById("descricao").value

        const body = new FormData()
        body.append('iduser', iduser)
        body.append('nomeuser', nome)
        body.append('setoruser', setor)
        body.append('problema', problema)
        body.append('descricao', descricao)

        const response = await fetch(`${baseUrl}novo.php`, {
            method: "POST",
            mode: 'no-cors',
            body
        })
        modal2.hide();
       window.location.href = "user.php";
    })
}