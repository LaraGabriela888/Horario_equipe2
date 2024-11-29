
    // Abrir o modal
    document.querySelectorAll('.modal-trigger').forEach(trigger => {
        trigger.addEventListener('click', function (e) {
            e.preventDefault();
            const modalId = this.getAttribute('href').replace('#', '');
            const modal = document.getElementById(modalId);
            modal.classList.add('active');
            const overlay = document.createElement('div');
            overlay.classList.add('modal-overlay');
            document.body.appendChild(overlay);

            // Fechar modal ao clicar no overlay
            overlay.addEventListener('click', () => closeModal(modal, overlay));
        });
    });

    // Fechar o modal
    document.querySelectorAll('.modal-close').forEach(btn => {
        btn.addEventListener('click', function () {
            const modal = this.closest('.modal');
            const overlay = document.querySelector('.modal-overlay');
            closeModal(modal, overlay);
        });
    });

    function closeModal(modal, overlay) {
        modal.classList.remove('active');
        if (overlay) overlay.remove();
    }
