const dropArea = document.querySelector(".drop-section");
const listSection = document.querySelector(".list-section");
const listContainer = document.querySelector(".list");
const fileSelector = document.querySelector(".file-selector");
const fileSelectorInput = document.querySelector(".file-selector-input");

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

fileSelectorInput.onchange = () => {
    [...fileSelectorInput.files].forEach((file) => {
        if (typeValidation(file.type)) {
            uploadFile(file);
        }
    });
};

fileSelector.onclick = () => fileSelectorInput.click();

fileSelectorInput.onchange = () => {
    [...fileSelectorInput.files].forEach((file) => {
        if (typeValidation(file.type)) {
            if (typeValidation(file.type)) {
                console.log(file);
            }
        }
    });
};

let timer;

dropArea.ondragover = (e) => {
    e.preventDefault();

    clearTimeout(timer);

    dropArea.classList.add("drag-over-effect");
    console.log("File is over DragArea");
};

dropArea.ondragleave = () => {
    // Set a short delay before removing the class
    timer = setTimeout(() => {
        dropArea.classList.remove("drag-over-effect");
        console.log("File left the DragArea");
    }, 100);
};
dropArea.ondrop = (e) => {
    e.preventDefault();
    dropArea.classList.remove("drag-over-effect");

    if (e.dataTransfer.items) {
        const files = [...e.dataTransfer.items].map((item) => item.getAsFile());
        files.forEach((file) => {
            if (typeValidation(file.type)) {
                uploadFile(file);
            }
        });
    }
};

function typeValidation(type) {
    var splitType = type.split("/")[0];
    if (splitType == "image" || splitType == "video") {
        return true;
    }
}

function uploadFile(file) {
    listSection.style.display = "block";
    var li = document.createElement("li");
    li.classList.add("in-prog");
    li.innerHTML = `

        <div class="col">
            <img src="/assets/images/icons/${iconSelector(file.type)} " alt="">
        </div>
        <div class="col">
            <div class="file-name">
                <div class="name">${file.name}</div>
                 <span>0%</span>
        </div>
        <div class="file-progress">
            <span></span>
        </div>
            <div class="file-size">${(file.size / (1024 * 1024)).toFixed(
                2
            )} MB</div>
        </div>
        <div class="col">
            <svg xmlns="http://www.w3.org/2000/svg" class="cross" width="25" height="25"
            fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path
                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="check" width="25" height="25"
                fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                <path
                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
            </svg>
        </div>

    `;
    listContainer.prepend(li);

    const formData = new FormData();
    formData.append("media_path[]", file);

    const http = new XMLHttpRequest();

    http.onload = () => {
        console.log("onload event triggered");
        li.classList.add("complete");
        li.classList.remove("in-prog");
    };

    http.upload.onprogress = (e) => {
        var percentComplete = (e.loaded / e.total) * 100;
        li.querySelector("span").innerHTML = Math.round(percentComplete) + "%";
        li.querySelector(".file-progress span").style.width =
            percentComplete + "%";
        console.log(percentComplete);
    };

    http.onabort = () => {
        li.remove();
    };

    // Handle the click event on the "cross" element
    li.querySelector(".cross").addEventListener("click", () => {
        http.abort();
    });
    
    console.log("CSRF Token:", csrfToken);

    // Make an AJAX request to the Laravel backend
    fetch("/demo/public-gallery/processUploadImage", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        body: formData,
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is JSON
        })
        .then((data) => {
            console.log(data);
            // Check if the server response indicates success
            if (data.success) {
                // Handle success
                console.log("File upload successful!");
            } else {
                // Handle failure
                console.error(
                    "File upload failed. Server response:",
                    data.message
                );
            }
        })
        .catch((error) => {
            console.error("error:", error);
        })
        .finally(() => {
            li.classList.add("complete");
            li.classList.remove("in-prog");
        });

    http.open("POST", "/demo/public-gallery/processUploadImage", true);
    http.send(formData);
}

function iconSelector(type) {
    var splitType =
        type.split("/")[0] == "application"
            ? type.split("/")[1]
            : type.split("/")[0];
    return splitType + ".png";
}
