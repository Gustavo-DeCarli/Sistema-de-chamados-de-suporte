const baseUrl = `//localhost/chamados/backend/`

let btnSalvar1 = null
let btnSalvar2 = null
let btnff = null
let modal2 = null
let modal1 = null


onload = async () => {
    modal1 = new bootstrap.Modal(document.getElementById("exampleModal1"))
    btnSalvar1 = document.getElementById("salvar1")
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
    if(btnff){
    btnff.addEventListener("click", async () => {
        
        const id = document.getElementById("ff").value

        const body = new FormData()
        body.append('ff', id)

        const response = await fetch(`${baseUrl}finalizar.php`, {
            method: "POST",
            body
        })
        window.location.href = "admin.php";
    })}
}
