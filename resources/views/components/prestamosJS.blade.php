<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

function getRandomNumber(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Ejemplo: Generar un número aleatorio entre 1 y 10
var randomNumber = getRandomNumber(5, 8);
var randomNumber2 = getRandomNumber(5, 6);
var randomNumber3 = getRandomNumber(5, 7);
console.log(randomNumber);



$(document).ready(function() {

    var monto = document.getElementById('monto');

    var mensualidad;

    $('#cliente_id').change(function() {
        var cliente_id = $(this).val();

        $.ajax({
            url: '/api/getsalary/' + cliente_id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $.each(data, function(key, value) {
                    console.log(value.sueldo)
                    if(parseFloat(value.sueldo) <= 15000)
                    {
                        resultado = (value.sueldo * 50) / 100;

                        monto.value =  resultado
                    }
                    else if(value.sueldo > 15000 && value.sueldo <= 30000)
                    {
                        if(randomNumber2 == 5)
                        {
                            resultado = (value.sueldo * 50) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber2 == 6)
                        {
                            resultado = (value.sueldo * 60) / 100;

                            monto.value =  resultado
                        }
                    }
                    else if(value.sueldo > 30000 && value.sueldo <= 45000)
                    {
                        if(randomNumber2 == 5)
                        {
                            resultado = (value.sueldo * 50) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber2 == 6)
                        {
                            resultado = (value.sueldo * 60) / 100;

                            monto.value =  resultado
                        }
                    }
                    else if(value.sueldo > 45000 && value.sueldo <= 60000)
                    {
                        if(randomNumber3 == 5)
                        {
                            resultado = (value.sueldo * 50) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber3 == 6)
                        {
                            resultado = (value.sueldo * 60) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber3 == 7)
                        {
                            resultado = (value.sueldo * 70) / 100;

                            monto.value =  resultado
                        }
                    }
                    else if(value.sueldo > 60000 && value.sueldo <= 75000)
                    {
                        if(randomNumber3 == 5)
                        {
                            resultado = (value.sueldo * 50) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber3 == 6)
                        {
                            resultado = (value.sueldo * 60) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber3 == 7)
                        {
                            resultado = (value.sueldo * 70) / 100;

                            monto.value =  resultado
                        }
                    }
                    else if(value.sueldo > 75000 && value.sueldo <= 100000)
                    {
                        if(randomNumber == 5)
                        {
                            resultado = (value.sueldo * 50) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber == 6)
                        {
                            resultado = (value.sueldo * 60) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber == 7)
                        {
                            resultado = (value.sueldo * 70) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber == 8)
                        {
                            resultado = (value.sueldo * 80) / 100;

                            monto.value =  resultado
                        }
                    }
                    else
                    {
                        if(randomNumber == 5)
                        {
                            resultado = (value.sueldo * 50) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber == 6)
                        {
                            resultado = (value.sueldo * 60) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber == 7)
                        {
                            resultado = (value.sueldo * 70) / 100;

                            monto.value =  resultado
                        }
                        else if(randomNumber == 8)
                        {
                            resultado = (value.sueldo * 80) / 100;

                            monto.value =  resultado
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });





    });
});


</script>
