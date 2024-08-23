document.getElementById('processor').addEventListener('change', function() {
    var processor = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status === 200) {
            var laptops = JSON.parse(this.responseText);
            var output = '';
            if (laptops.length > 0) {
                laptops.forEach(function(laptop) {
                    output += '<div class="laptop">';
                    output += '<h3>' + laptop.brand_name + '</h3>';
                    output += '<p>Processor: ' + laptop.processor + '</p>';
                    output += '<p>RAM: ' + laptop.ram + '</p>';
                    output += '<p>Storage: ' + laptop.storage + '</p>';
                    output += '<p>Price: $' + laptop.price.toFixed(2) + '</p>';
                    output += '</div>';
                });
            } else {
                output = '<p>No laptops found for this processor.</p>';
            }
            document.getElementById('laptop-details').innerHTML = output;
        }
    };
    xhr.send('processor=' + encodeURIComponent(processor));
});
