<?php
require_once ('src/BigFilesUpload.php');

$allowedExtensions=\Codern\BigFilesUpload::getAllowedUploadFileTypesJSON();

echo '  
                
                <h1>Adaugare documente dosar</h1>
                <div class="wrapper-multi-upload alert alert-warning" style="">
                    <strong class="error">Adaugare documente dosar, urmati instructiunile de mai jos: </strong>

                    <ol class="help-tip" style="margin: 15px;">
                        <li>Click pe butonul "Selecteaza fisiere"</li>
                        <li>In fereastra de dialog, selectati unul sau mai multe fisiere pentru preluare</li>
                        <li>Click pe butonul "Open". Fereastra de dialog se va inchide, iar documentele selectate vor fi listate in interfata</li>
                        <li>Click pe butonul "Incarca fisiere". Progresul va fi afisat in dreptul fiecarui fisier. <span class="error">NU INCHIDETI PAGINA PANA LA FINALIZAREA PROCESULUI DE INCARCARE A FISIERELOR!</span></li>
                        <li>Odata preluate documentele, pagina curenta se va reincarca si puteti observa fisierele in sectiunea "Documente scanate si neinregistrate".</li>
                    </ol>

                    <div class="filelist-interface">
                       <strong> Documente selectate adaugare: </strong>
                        <div id="filelist" class="upload-filelist">Your browser doesn\'t have Flash, Silverlight or HTML5 support.</div>
                    </div>
                    <br />

                    <div id="container">
                        <a id="pickfiles" class="upload-file" href="javascript:;">Selecteaza fisiere</a>
                        <a id="uploadfiles" class="upload-file" href="javascript:;" data-did="$id" data-module="$this->moduleName">Incarca fisiere</a>
                    </div>

                    <br />
                    <pre id="console"></pre>
                </div>
                    <!-- must have scripts -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                    <script type="text/javascript" src="js/plupload.full.min.js"></script>
                    <script type="text/javascript" src="js/scripts.js"></script>
                    <script type="text/javascript">initPlupload(\''.$allowedExtensions.'\')</script>';

