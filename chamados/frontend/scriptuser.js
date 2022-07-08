const baseUrl = `//192.168.0.102/backend/`;


let modal2 = null
let btnSalvar2 = null
onload = async () => {
    modal2 = new bootstrap.Modal(document.getElementById("exampleModal2"))

    btnSalvar2 = document.getElementById("Salvar2")

    btnSalvar2.addEventListener("click", async () => {
        const nome = document.getElementById("nomeuser").value
        const setor = document.getElementById("setor").value
        const problema = document.getElementById("problema").value
        const descricao = document.getElementById("descricao").value

        const body = new FormData()
        body.append('nomeuser', nome)
        body.append('setor', setor)
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