function showMedia() {
    const selectedElement = document.querySelector('#media').selectedIndex
    const display = selectedElement ? 'none' : 'flex'
    document.getElementById('spanInfo5').textContent = selectedElement == 2 ? 'Autor(a)' : 'Elenco'
    document.getElementById('inputInfo5').setAttribute('name', selectedElement == 2 ? 'author' : 'cast')
    document.getElementById('spanInfo6').style.display = display
    document.getElementById('inputInfo6').style.display = display

    const form = document.getElementById('mediaForm')
    const action = ['filme', 'serie', 'livro'] 
    form.action = window.location.assign("../../views/media/media_register_page")
}

function cancel() {
    window.location.assign("../../home")
} 