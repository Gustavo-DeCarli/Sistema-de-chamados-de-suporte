const baseUrl = `//192.168.0.117/backend/`;

let modal1 = null
let modal3 = null
let btnSalvar = null
let btnff = null

onload = async () => {
    modal1 = new bootstrap.Modal(document.getElementById("exampleModal1"))
    modal3 = new bootstrap.Modal(document.getElementById("exampleModal3"))

    btnff = document.getElementById("ff")
    btnff.addEventListener("click", async () => {

        const id = document.getElementById("idf2").value
        const conclusao = document.getElementById("conclusao").value

        const body = new FormData()
        body.append('idf2', id)
        body.append('conclusao', conclusao)

        const response = await fetch(`${baseUrl}finalizar.php`, {
            method: "POST",
            mode: 'no-cors',
            body
        })
        modal3.hide();
        window.location.href = "admin.php";
    })

    btnSalvar = document.getElementById("Salvar")

    btnSalvar.addEventListener("click", async () => {
        
        const id = document.getElementById("idf").value
        const status = document.getElementById("status").value
        const atendente = document.getElementById("atendente").value
        const previsao = document.getElementById("previsao").value

        const body = new FormData()
        body.append('idf', id)
        body.append('status', status)
        body.append('atendente', atendente)
        body.append('previsao', previsao)

        const response = await fetch(`${baseUrl}alterar.php`, {
            method: "POST",
            mode: 'no-cors',
            body
        })
        modal1.hide();
        window.location.href = "admin.php";
    })
}
