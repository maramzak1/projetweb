<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data (save the song details, handle the file upload, etc.)
    // Add your form processing logic here

    // For demonstration purposes, let's just display the submitted data
    echo "<h2>Submitted Song Details:</h2>";
    echo "<p>Title: " . htmlspecialchars($_POST['title']) . "</p>";
    echo "<p>Album: " . htmlspecialchars($_POST['album']) . "</p>";
    echo "<p>Type: " . htmlspecialchars($_POST['type']) . "</p>";
    echo "<p>Singer: " . htmlspecialchars($_POST['singer']) . "</p>";

    // Assuming you have a function to handle file upload and get the audio URL
    $audio_url = handleFileUpload($_FILES['audio']);
    echo "<p>Audio URL: " . htmlspecialchars($audio_url) . "</p>";
}

// Function to create a song label
function createSongLabel($song) {
    echo "<li class='playlist-number'>";
    echo "<div class='song-info'>";
    echo "<h4>" . htmlspecialchars($song['title']) . "</h4>";
    echo "<p><strong>Album</strong>: " . htmlspecialchars($song['album']) . "&nbsp;|&nbsp;";
    echo "<strong>Type</strong>: " . htmlspecialchars($song['type']) . "&nbsp;|&nbsp;";
    echo "<strong>Singer</strong>: " . htmlspecialchars($song['singer']) . "</p>";
    echo "</div>";
    echo "<div class='music-icon'>";
    echo "<audio controls>";
    echo "<source src='" . htmlspecialchars($song['audio_url']) . "' type='audio/mpeg'>";
    echo "Your browser does not support the audio tag.";
    echo "</audio>";
    echo "<button class='play-button' onclick='playAudio(\"" . htmlspecialchars($song['audio_url']) . "\")'>Play</button>";
    echo "</div>";
    echo "<div class='clearfix'></div>";
    echo "</li>";
}

// Function to handle file upload and get the audio URL
function handleFileUpload($file) {
    // Add your file upload logic here
    // Move the uploaded file to a desired location and return the URL
    // Example:
    $upload_dir = 'uploads/';
    $audio_url = $upload_dir . basename($file['name']);
    //move_uploaded_file($file['tmp_name'], $audio_url);
    return $audio_url;
}

// Your existing song data array
$songs = [
    // Existing song data...
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your head content here -->
    <script>
        function playAudio(audioUrl) {
            var audio = new Audio(audioUrl);
            audio.play();
        }
    </script>
</head>
<body>
    <!-- Your existing HTML content -->

    <!-- Playlist Content -->
    <div class="playlist-content">
        <ul class="list-unstyled">
			
        </ul>
    </div>

    <!-- Song Submission Form -->
    <div class="song-form">
        <h2>Add a New Song</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <!-- Song Information Fields -->
            <label for="title">Title:</label>
            <input type="text" name="title" required>

            <label for="album">Album:</label>
            <input type="text" name="album" required>

            <label for="type">Type:</label>
            <input type="text" name="type" required>

            <label for="singer">Singer:</label>
            <input type="text" name="singer" required>

            <!-- File Upload Field -->
            <label for="audio">Upload Audio File:</label>
            <input type="file" name="audio" accept=".mp3" required>

            <!-- Submit Button -->
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Your existing script includes here -->
</body>
</html>
