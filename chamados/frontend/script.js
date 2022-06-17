const baseUrl = `//localhost/chamados/backend/`

let btnSalvar1 = null

onload = async () => {
    btnSalvar1 = document.getElementById("salvar1")
    modal1 = new bootstrap.Modal(document.getElementById('exampleModal1'))

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
    })
}

