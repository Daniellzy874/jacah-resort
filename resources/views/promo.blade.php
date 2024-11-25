<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight ">
            {{ __('Promo Offer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('composePromo')}}" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="bg-white mb-8 flex overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 h-[100%] border-4 border-dashed text-gray-900 w-[50%]">
                        <img src="{{asset('assets/image/announcement/announcement.png')}}" id="imagePreview" alt="" class="h-[100%]">
                        <input name="promoImage" type="file" accept="image/*" id="fileInput">
                    </div>
                    <div class="flex flex-col p-6 text-gray-900 w-[50%] gap-4">
                        <input type="text" name="promoHeader" class="border-2 border-gray-400 rounded-md" placeholder="ex.(20% PROMO) ">
                        <textarea name="promoDescription" id="textarea" placeholder="type the description" class="border-2 border-gray-400 rounded-md h-[50%]"></textarea>
                        <div class="flex justify-between">
                            <small id="word-count-info">Word Limit: 25 words</small>
                            <small id="word-count-feedback" style="color: red;"></small>
                        </div>
                        <div>
                            <button class="btn btn-success">COMPOSE</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    // Set the word limit
    const wordLimit = 25;

    const textarea = document.getElementById('textarea');
    const wordCountInfo = document.getElementById('word-count-info');
    const wordCountFeedback = document.getElementById('word-count-feedback');

    // Function to count words
    function countWords(text) {
        const words = text.trim().split(/\s+/); // Split by any whitespace
        return words.filter(Boolean).length; // Filter out empty strings from the array
    }

    // Event listener for typing in the textarea
    textarea.addEventListener('input', function() {
        const text = textarea.value;
        const wordCount = countWords(text);

        // Update feedback on the word count
        if (wordCount > wordLimit) {
            wordCountFeedback.textContent = `You have exceeded the word limit by ${wordCount - wordLimit} words.`;
        } else {
            wordCountFeedback.textContent = `${wordCount} / ${wordLimit} words used.`;
        }

        // Disable further typing if the limit is reached
        if (wordCount > wordLimit) {
            textarea.value = text.split(/\s+/).slice(0, wordLimit).join(' '); // Trim to word limit
        }
    });
</script>
<script>
    document.getElementById("fileInput").addEventListener("change", function(event) {
        const file = event.target.files[0]; // Get the selected file
        const preview = document.getElementById("imagePreview"); // Get the image element

        if (file) {
            // Create a URL for the selected file
            const reader = new FileReader();

            reader.onload = function(e) {
                // Set the preview image source to the loaded file data
                preview.src = e.target.result;
                preview.style.display = "block"; // Show the image
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            preview.style.display = "none"; // Hide the image if no file is selected
        }
    });
</script>