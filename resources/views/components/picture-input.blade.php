<div class="flex items-center" x-data="picturePreview()">
    <div class="rounded-full bg-gray-200 w-16 h-16 mr-2">
        <img id="preview" src="{{asset(asset('assets/image/pofile_pic_default/PROF-PIC.png'))}}" alt="" class="w-16 h-16 rounded-full object-cover">
    </div>
    <div>
        <x-secondary-button @click="document.getElementById('picture').click()" class="relative" style="width:100%; height:30px;">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                </svg>
                <p style="font-size: 10px;">Upload profile picture</p>
            </div>
            <input @change="showPreview(event)" type="file" name="picture" id="picture" class="absolute inset-0 -z-10 opacity-0">
        </x-secondary-button>


    </div>
    <script>
        function picturePreview() {
            return {
                showPreview: (event) => {
                    if (event.target.files.length > 0) {
                        var src = URL.createObjectURL(event.target.files[0]);
                        document.getElementById('preview').src = src;
                    }

                }
            }
        }
    </script>
</div>