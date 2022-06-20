const baseUrl = `//localhost/chamados/backend/`

let btnSalvar1 = null
let btnSalvar2 = null
let btnff = null
let modal2 = null
let modal1 = null


onload = async () => {
    btnSalvar1 = document.getElementById("salvar1")
    modal1 = new bootstrap.Modal(document.getElementById("exampleModal1"))

    btnSalvar1.addEventListener("click", async () => {
        
        const id = document.getElementById("idf").value
        const status = document.getElementById("status").value

        const body = new FormData()
        body.append('idf', id)
        body.append('status', status)

        const response = await fetch(`${baseUrl}alterar.php`, {
            method: "POST",
            body
        })
        modal1.hide();
        window.location.href = "admin.php";
    })

    btnff = document.getElementById("ff")
    btnff.addEventListener("click", async () => {
        
        const id = document.getElementById("ff").value

        const body = new FormData()
        body.append('ff', id)

        const response = await fetch(`${baseUrl}finalizar.php`, {
            method: "POST",
            body
        })
        modal1.hide();
        window.location.href = "admin.php";
    })

    btnSalvar2 = document.getElementById("salvar2")
    modal2 = new bootstrap.Modal(document.getElementById("exampleModal2"))
    
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
            body
        })
        modal2.hide();
        window.location.href = "user.php";
    })
}
