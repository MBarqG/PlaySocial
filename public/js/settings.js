var menuIcon = document.querySelector(".menu-icon")
var sidebar = document.querySelector(".sidebar")
var containers = document.querySelectorAll(".container")
var usericon = document.querySelector(".user-icon")

menuIcon.onclick = function () {
    sidebar.classList.toggle("minimize");
    containers.forEach(element => {
      element.classList.toggle("Largecontainer");
    });

}

    document.addEventListener('DOMContentLoaded', () => {
      const dropZone = document.getElementById('drop-zone');
      const imagePreview = document.getElementById('image-preview');

      dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('active');
      });

      dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('active');
      });

      dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('active');
        const file = e.dataTransfer.files[0];
        const reader = new FileReader();

        reader.onload = () => {
          imagePreview.src = reader.result;
        };

        if (file) {
          reader.readAsDataURL(file);
        }
      });

      dropZone.addEventListener('click', () => {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = (e) => {
          const file = e.target.files[0];
          const reader = new FileReader();

          reader.onload = () => {
            imagePreview.src = reader.result;
          };

          if (file) {
            reader.readAsDataURL(file);
          }
        };
        input.click();
      });
    });