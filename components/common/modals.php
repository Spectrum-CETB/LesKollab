<!-- post project modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 style="font-family: sans-serif;padding: 1vw;">Post A Project</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../scripts/post-project.php" method="post" enctype="multipart/form-data">
                    <label>
                        <p class="label-txt">Project Name</p>
                        <input type="text" class="input" name="pname" />
                        <input type="hidden" class="input" name="email" value="<?= $email ?>" />
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <p class="label-txt">Project Description</p>
                        <input type="text" class="input" name="pdes" />
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <p class="label-txt">Project Link</p>
                        <input type="text" class="input" name="plink" />
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <p class="label-txt">Stack Used <small>(separated by spaces)</small></p>
                        <input type="text" id="stack" class="input" name="tags" />
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                        <span id="dstack" style="padding: 0;margin: 0;"></span>
                    </label>
                    <label>
                        <p class="label-txt">Field</p>
                        <input type="text" class="input" name="field" />
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                        <span id="dstack" style="padding: 0;margin: 0;"></span>
                    </label>
                    <label>
                        <p class="label-txt">Screenshots(if any)</p>
                        <input type="file" class="form-control" name="screenshot" id="inputGroupFile02" required />
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                        <span id="dstack" style="padding: 0;margin: 0;"></span>
                    </label>
                    <br>
                    <button type="submit">Post</button>
                </form>
            </div>
        </div>
    </div>
</div>