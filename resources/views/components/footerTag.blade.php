{{--external script declarations--}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{--switching tabs script--}}
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

{{--searching loop for individual tasks--}}
<script>
    function main31() {
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

{{--script to select an item to message and display its corresponding message area while hidning the rest--}}
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
                const id = li.getAttribute('id');

                // Get the corresponding element in the second loop
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

{{--table script to filter among pending and annulled--}}
<script>
    function filterTable(id) {
        // Get the checkbox values
        var pending = document.querySelector('input[value="pending"]:checked');
        var annulled = document.querySelector('input[value="annulled"]:checked');
        var registered = document.querySelector('input[value="registered"]:checked');
        var accepted = document.querySelector('input[value="accepted"]:checked');
        // Get the table with the id "table1"
        var table = document.querySelector("#" + id);
        // Get the table rows with the .tbody class
        var rows = table.querySelectorAll("tr.tbody");
        // Loop through the rows
        for (var i = 0; i < rows.length; i++) {
            // Get the value of the "Application Status" column
            var status = rows[i].cells[7].querySelector("h2").textContent;
            // If the value of the "Application Status" column matches a checked checkbox value, show the row
            if ((pending && status === "pending") ||
                (annulled && status === "annulled") ||
                (registered && status === "registered") ||
                (accepted && status === "accepted")) {
                rows[i].style.display = "table-row";
            }
            // If the value of the "Application Status" column does not match a checked checkbox value, hide the row
            else {
                rows[i].style.display = "none";
            }
        }
    }
</script>
