document
    .getElementById("survey_type_id")
    .addEventListener("change", (event) => {
        let id = event.target.value;
        let html = "";
        if (id == 3) {
            html +=
                '<label for="result[' +
                id +
                ']" class="col-md-4 col-form-label">Text</label>' +
                '<div class="col-md-6">' +
                '<textarea class="form-control" id="choice[' +
                id +
                '][]" name="choice[' +
                id +
                '][]"></textarea>';
            ("</div>");
        } else {
            html +=
                '<label for="add_more[' +
                id +
                ']" class="col-md-4 col-form-label text-md-end" >Add Choice</label>' +
                '<div class="col-md-6">' +
                '<button type="button" class="btn btn-success" data-id="' +
                id +
                '" id="add_more" name="add_more[' +
                id +
                ']">Add</button>';
            ("</div>");
        }

        document.getElementById("row-add").innerHTML = html;
        choiceAdd();
    });
function choiceAdd() {
    document.getElementById("add_more").addEventListener("click", (event) => {
        let id_for_add = event.target.getAttribute("data-id");
        let row = document.createElement("div");
        row.classList = "row mb-2";

        let col = document.createElement("div");
        col.classList = "col-md-10";

        let col2 = document.createElement("div");
        col2.classList = "col-md-2";

        let button = document.createElement("button");
        button.setAttribute("type", "button");
        button.classList = "btn btn-danger remove";
        button.textContent = "Del";
        button.onclick = choiceDel;

        col2.appendChild(button);

        row.appendChild(col);
        row.appendChild(col2);

        let newElement = document.createElement("input");
        newElement.classList.add("form-control");
        newElement.classList.add("mb-1");
        newElement.setAttribute("name", "choice[" + id_for_add + "][]");
        newElement.setAttribute("id", "choice[" + id_for_add + "][]");
        newElement.setAttribute("required", true);

        col.appendChild(newElement);
        // Find the target element
        let targetElement = event.target;

        // Get the parent element of the target element
        let parentElement = targetElement.parentNode;

        // Append the new element before the target element
        parentElement.insertBefore(row, targetElement);
    });
}

function choiceDel() {
    this.parentElement.parentElement.remove();
}
