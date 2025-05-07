// document.getElementById("dateTimeForm").addEventListener("submit", function (e) {
//         e.preventDefault(); // Prevent the default form submission behavior
//         sendData();
//     });
	 function showForm() {
        var form = document.getElementById('dateTimeForm');
        var overlay = document.getElementById('overlay');
        var prodDiv = document.getElementById('products');

        form.style.display = 'block';
        overlay.style.display = 'block';
        prodDiv.style.display = 'none';
    }

    function hideForm() {
        var form = document.getElementById('dateTimeForm');
        var overlay = document.getElementById('overlay');
        form.style.display = 'none';
        overlay.style.display = 'none';
    }

    function sendData() {
        var form = document.getElementById('dateTimeForm');
        form.style.display = 'none';
        hideForm();
    }
    function showAnother() {
    var form = document.getElementById('another_popup');
    var btn = document.getElementById('another');



    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        form.style.display = 'none';
        btn.innerText = "*Add Another Size & Price*"; 
    }
}

function showAnotherFlavor1() {
    var form = document.getElementById('another_flavor1');
    var btn = document.getElementById('anotherFlavor');

    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        form.style.display = 'none';
        btn.innerText = "*Add Another Flavor*"; 
    }
}

function showAnotherFlavor2() {
    var form = document.getElementById('another_flavor2');
    var btn = document.getElementById('anotherFlavor3');

    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        form.style.display = 'none';
        btn.innerText = "*Add Another Flavor #3*"; 
    }
}

function showAnotherFlavor3() {
    var form = document.getElementById('another_flavor3');
    var btn = document.getElementById('anotherFlavor4');

    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        form.style.display = 'none';
        btn.innerText = "*Add Another Flavor #4*"; 
    }
}
function showAnotherFlavor4() {
    var form = document.getElementById('another_flavor4');
    var btn = document.getElementById('anotherFlavor5');

    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        form.style.display = 'none';
        btn.innerText = "*Add Another Flavor #5*"; 
    }
}
function updateOptions() {
    var selectedSize = document.getElementById('size1').value;
    var size2Options = document.getElementById('size2').options;

    for (var i = 0; i < size2Options.length; i++) {
        if (size2Options[i].value === selectedSize) {
            size2Options[i].disabled = true;
        } else {
            size2Options[i].disabled = false;
        }
    }
    var size1SelectedIndex = document.getElementById('size1').selectedIndex;
    if (size1SelectedIndex !== 0) {
        document.getElementById('size2').getElementsByTagName('option')[0].disabled = true;
    } else {
        document.getElementById('size2').getElementsByTagName('option')[0].disabled = false;
    }
}



    // added products

    document.getElementById("products").addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent the default form submission behavior
        sendData();
    });
	 function showProd() {
        var form = document.getElementById('products');
        var overlay = document.getElementById('overlay');
        form.style.display = 'block';
        overlay.style.display = 'block';
    }

    function hideProd() {
        var form = document.getElementById('products');
        var overlay = document.getElementById('overlay');
        form.style.display = 'none';
        overlay.style.display = 'none';
    }

    function sendData() {
        var form = document.getElementById('products');
        form.style.display = 'none';
        hideForm();
    }