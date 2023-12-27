function openVideoModal(videoPath) {
    console.log("Open Video Modal:", videoPath);
    var modal = document.getElementById("myVideoModal");
    var modalVideo = document.getElementById("modalVideo");

    // Set the video source
    modalVideo.src = videoPath;

    // Display the modal
    modal.style.display = "block";
}

function openImageModal(imagePath) {
    console.log("Open Image Modal:", imagePath);
    var modal = document.getElementById("myModal");
    var modalImage = document.getElementById("modalImage");

    // Set the image source
    modalImage.src = imagePath;

    // Display the modal
    modal.style.display = "block";
}

function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        if (modalId === "myVideoModal") {
            var modalVideo = document.getElementById("modalVideo");
            modalVideo.pause();
            modalVideo.src = "";
        }
        modal.style.display = "none";
    }
}

// Close the modal if the user clicks outside of it
window.onclick = function (event) {
    var modalIds = ["myVideoModal", "myModal"];

    if (modalIds.includes(event.target.id)) {
        closeModal(event.target.id);
    }
};

