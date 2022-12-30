{{--external script declarations--}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{--switching script--}}
<script>
    // tab switching
    function switchcommon(evt, mainName) {
        var i, tabcontent, tablinks;
        //get all elements under tabcontent and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(mainName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // for default page
    document.getElementById("defaultOpen").click();
</script>

{{--searching loop--}}
<script>

    function myFunction() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName('li');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>

<script>
    $(document).ready(function () {
        // Get all the li elements in the first loop
        const liElements = document.querySelectorAll('.message__navigation .message__list li');

        // Hide all elements in the message__area initially
        document.querySelectorAll('.message__area .message__container').forEach((el) => {
            el.style.display = 'none';
        });
        // Add a click event listener to each li element
        liElements.forEach((li) => {
            li.addEventListener('click', () => {

                // Get the index of the li element from the data attribute
                // const index = li.getAttribute('data-index');

                // Get the corresponding element in the second loop
                // const correspondingElement = document.querySelector(`.message__area .message__container`).getAttribute(index);

                const id = li.getAttribute('id');
                const correspondingElement = document.querySelector(`.message__area .message__container#${id}`);


                // Show the corresponding element and hide the other elements
                correspondingElement.style.display = 'block';
                document.querySelectorAll(`.message__area .message__container:not(#${id})`).forEach((el) => {
                    el.style.display = 'none';
                });
            });
        });
    });
</script>
