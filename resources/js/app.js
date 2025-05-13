import './bootstrap';


Livewire.on('refreshPage', () => {
    window.location.reload();
});

window.onload = function(){
    console.log("Loaded")
}

document.addEventListener("DOMContentLoaded", function() {
    const lazyImages = document.querySelectorAll('.lazy-image');

    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const lazyImage = entry.target;
                lazyImage.src = lazyImage.dataset.src;
                lazyImage.classList.remove('lazy-image');
                observer.unobserve(lazyImage);
            }
        });
    });

    lazyImages.forEach(image => {
        imageObserver.observe(image);
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const colorButtons = document.querySelectorAll('[onclick^="selectColor"]');
    const sizeButtons = document.querySelectorAll('[onclick^="selectSize"]');
    const tabButtons = document.querySelectorAll('[onclick^="setActiveTab"]');

    let selectedColor = null;
    let selectedSize = null;

    function selectColor(color) {
        selectedColor = color;
        colorButtons.forEach(button => {
            button.classList.remove('ring-2', 'ring-offset-2', 'ring-indigo-500');
            if (button.getAttribute('onclick').includes(color)) {
                button.classList.add('ring-2', 'ring-offset-2', 'ring-indigo-500');
            }
        });
        updateAddToCartButton();
    }

    function selectSize(size) {
        selectedSize = size;
        sizeButtons.forEach(button => {
            button.classList.remove('bg-indigo-600', 'text-white');
            button.classList.add('bg-gray-200', 'text-gray-900');
            if (button.getAttribute('onclick').includes(size)) {
                button.classList.remove('bg-gray-200', 'text-gray-900');
                button.classList.add('bg-indigo-600', 'text-white');
            }
        });
        updateAddToCartButton();
    }

    function updateAddToCartButton() {
        const addToCartButton = document.querySelector('button[type="button"]');
        if (selectedColor && selectedSize) {
            
        } else {

        }
    }

    

    function setActiveTab(tabName) {
        const tabContents = document.querySelectorAll('.prose > div');
        tabContents.forEach(el => el.classList.add('hidden'));

        const selectedTab = document.getElementById(tabName);
        if (selectedTab) {
            selectedTab.classList.remove('hidden');
        }

        tabButtons.forEach(el => {
            el.classList.remove('border-indigo-500', 'text-indigo-600');
            el.classList.add('border-transparent', 'text-gray-500');
            if (el.getAttribute('onclick').includes(tabName)) {
                el.classList.remove('border-transparent', 'text-gray-500');
                el.classList.add('border-indigo-500', 'text-indigo-600');
            }
        });
    }

    // Initialize the page
    updateAddToCartButton();
    setActiveTab('description'); // Ensure the description tab is visible by default

    // Set up event listeners for color, size, and tab buttons
    colorButtons.forEach(button => {
        button.addEventListener('click', function() {
            const color = this.getAttribute('onclick').match(/'([^']+)'/)[1];
            selectColor(color);
        });
    });

    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const size = this.getAttribute('onclick').match(/'([^']+)'/)[1];
            selectSize(size);
        });
    });

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabName = this.getAttribute('onclick').match(/'([^']+)'/)[1];
            setActiveTab(tabName);
        });
    });
});
