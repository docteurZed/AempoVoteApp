<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

<script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });

    const hiddenInput = document.querySelector('#programme');

    // Remplissage initial si contenu déjà existant
    hiddenInput.value = quill.root.innerHTML;

    // À chaque modification de l'éditeur, on met à jour le hidden input
    quill.on('text-change', function() {
        hiddenInput.value = quill.root.innerHTML;
    });
</script>
