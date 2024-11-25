<div class="modal fade" id="myModalGallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 230%; transform: translate(-28%);">
            <div class="modal-header" style="    background-color: #294B29;">
                <h5 class="modal-title text-white" id="exampleModalLabel">360degree photos</h5>
                <button style="margin-right: 20px;" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="flex text-4xl text-white" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div className="modal-header" style="border-bottom:none; margin-top:10px;">
                <div style="height:100%; width:100%; gap:5px; display:flex; ">
                    @viteReactRefresh
                    @vite('resources/js/gallery.js')
                    <div id="gal-btn">
                    </div>
                </div>
            </div>
            <div class="modal-body ">
                <div id="gallery-modal">
                </div>
            </div>
        </div>
    </div>
</div>