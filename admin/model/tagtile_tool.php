<?php function tagtile_error_handler_for_export_import($errno,$errstr,$errfile,$errline){switch($errno){case E_NOTICE:case E_USER_NOTICE:$errors=base64_decode('Tm90aWNl');break;case E_WARNING:case E_USER_WARNING:$errors=base64_decode('V2FybmluZw==');break;case E_ERROR:case E_USER_ERROR:$errors=base64_decode('RmF0YWwgRXJyb3I=');break;default:$errors=base64_decode('VW5rbm93bg==');break;}$url=$_SERVER[base64_decode('SFRUUF9SRUZFUkVS')].$_SERVER[base64_decode('UkVRVUVTVF9VUkk=')];$request=array(base64_decode('cm91dGU=')=>explode(base64_decode('dGFndGlsZSY='),$url));if(($errors==base64_decode('V2FybmluZw=='))||($errors==base64_decode('VW5rbm93bg=='))){return true;}print(base64_decode('UEhQIA==').$errors.base64_decode('OiAg').$errstr.base64_decode('IGluIA==').$errfile.base64_decode('IG9uIGxpbmUg').$errline);$dir=base64_decode('YWRtaW5fdGFndGlsZQ==');if(($errors!=base64_decode('RmF0YWwgRXJyb3I='))&&isset($request->get[base64_decode('cm91dGU=')])&&($request->get[base64_decode('cm91dGU=')]!="$dir/download")){echo base64_decode('PGI+').$errors.base64_decode('PC9iPjog').$errstr.base64_decode('IGluIDxiPg==').$errfile.base64_decode('PC9iPiBvbiBsaW5lIDxiPg==').$errline.base64_decode('PC9iPg==');}else{$_SESSION[base64_decode('dGFndGlsZQ==')][base64_decode('ZXhwb3J0X2ltcG9ydF9lcnJvcg==')]=array(base64_decode('ZXJyc3Ry')=>$errstr,base64_decode('ZXJybm8=')=>$errno,base64_decode('ZXJyZmlsZQ==')=>$errfile,base64_decode('ZXJybGluZQ==')=>$errline);}return true;}function tagtile_fatal_error_shutdown_handler_for_export_import(){$last_error=error_get_last();if($last_error[base64_decode('dHlwZQ==')]===E_ERROR){tagtile_error_handler_for_export_import(E_ERROR,$last_error[base64_decode('bWVzc2FnZQ==')],$last_error[base64_decode('ZmlsZQ==')],$last_error[base64_decode('bGluZQ==')]);}}class ModelTagTileTool{public function upload($filename,$incremental=false){set_error_handler(base64_decode('dGFndGlsZV9lcnJvcl9oYW5kbGVyX2Zvcl9leHBvcnRfaW1wb3J0'),E_ALL);register_shutdown_function(base64_decode('dGFndGlsZV9mYXRhbF9lcnJvcl9zaHV0ZG93bl9oYW5kbGVyX2Zvcl9leHBvcnRfaW1wb3J0'));try{$_SESSION[base64_decode('dGFndGlsZQ==')][base64_decode('ZXhwb3J0X2ltcG9ydF9ub2NoYW5nZQ==')]=1;$cwd=getcwd();$dir=base64_decode('c3lzdGVtL1BIUEV4Y2Vs');chdir(TAGTILE_DIR.$dir);require_once(base64_decode('Q2xhc3Nlcy9QSFBFeGNlbC5waHA='));chdir($cwd);$inputFileType=PHPExcel_IOFactory::identify($filename);$objReader=PHPExcel_IOFactory::createReader($inputFileType);$objReader->setReadDataOnly(true);$reader=$objReader->load($filename);$_SESSION[base64_decode('dGFndGlsZQ==')][base64_decode('ZXhwb3J0X2ltcG9ydF9ub2NoYW5nZQ==')]=0;if($this->uploadPages($reader,$incremental))return true;else return false;}catch(Exception $e){$errstr=$e->getMessage();$errline=$e->getLine();$errfile=$e->getFile();$errno=$e->getCode();$_SESSION[base64_decode('dGFndGlsZQ==')][base64_decode('ZXhwb3J0X2ltcG9ydF9lcnJvcg==')]=array(base64_decode('ZXJyc3Ry')=>$errstr,base64_decode('ZXJybm8=')=>$errno,base64_decode('ZXJyZmlsZQ==')=>$errfile,base64_decode('ZXJybGluZQ==')=>$errline);print(base64_decode('UEhQIA==').get_class($e).base64_decode('OiAg').$errstr.base64_decode('IGluIA==').$errfile.base64_decode('IG9uIGxpbmUg').$errline);return false;}}protected function uploadPages(&$reader,$incremental){global $wpdb;$data=$reader->getSheet(0);if($data==null){return;}if(!$incremental){$sql=base64_decode('VFJVTkNBVEUgVEFCTEUgYA==').$wpdb->prefix.base64_decode('dGFndGlsZV9saW5rc19wYWdlYA==');$wpdb->query($sql);}$k=$data->getHighestRow();if($k>2){$_SESSION[base64_decode('dGFndGlsZQ==')][base64_decode('bGltaXRfZXJyb3I=')]=1;return false;}$max_col=PHPExcel_Cell::columnIndexFromString($data->getHighestColumn());$page_id=time();for($i=0;$i<=$k;$i+=1){$j=1;$page_url=trim($this->getCell($data,$i,$j++));if($page_url==''){continue;}$links=array();while($j<=$max_col){$anchor=$this->getCell($data,$i,$j++);$link=$this->getCell($data,$i,$j++);if($link=='')break;$links[]=array(base64_decode('YW5jaG9y')=>htmlspecialchars($anchor),base64_decode('bGluaw==')=>trim($link),base64_decode('cGFnZV91cmw=')=>$page_url);}if($incremental){$this->deletePage($page_url);}$this->PageIntoDatabase($links,$page_id++);}return true;}protected function setCellRow($worksheet,$row,$data,&$default_style=null,&$styles=null){if(!empty($default_style)){$worksheet->getStyle("$row:$row")->applyFromArray($default_style,false);}if(!empty($styles)){foreach($styles as $col=>$style){$worksheet->getStyleByColumnAndRow($col,$row)->applyFromArray($style,false);}}$worksheet->fromArray($data,null,base64_decode('QQ==').$row,true);}protected function populateLinksWorksheet(&$worksheet){global $wpdb;$styles=array();$data=array();$row=1;$j=0;$sql=sprintf(base64_decode('U0VMRUNUIHBhZ2VfaWQsdXJsLGFuY2hvcixsaW5rIEZST00gJXN0YWd0aWxlX2xpbmtzX3BhZ2UgT1JERVIgQlkgcGFnZV9pZCBBU0M='),$wpdb->prefix);$links=$wpdb->get_results($sql);for($i=0;$i<count($links);){$worksheet->getRowDimension($i)->setRowHeight(26);$data[$j++]=$page_id=$links[$i][base64_decode('cGFnZV9pZA==')];while($i<count($links)&&$page_id==$links[$i][base64_decode('cGFnZV9pZA==')]){$data[$j++]=$links[$i][base64_decode('YW5jaG9y')];$data[$j++]=$links[$i][base64_decode('bGluaw==')];$i++;}$this->setCellRow($worksheet,$row,$data);$j=0;$row++;}}protected function PageIntoDatabase($links,$page_id){global $wpdb;$sql=base64_decode('SU5TRVJUIElOVE8gYA==').$wpdb->prefix.base64_decode('dGFndGlsZV9saW5rc19wYWdlYCAoYGxpbmtfaWRgLGBwYWdlX3R5cGVgLGBhbmNob3JgLGBsaW5rYCxgcGFnZV9pZGAsYHVybGApIFZBTFVFUyA=');$i=1;foreach($links as $link){if(count($links)>$i)$comma=base64_decode('LA==');else $comma='';$sql.=base64_decode('KG51bGwsJ3VybCcsJw==').$link[base64_decode('YW5jaG9y')].base64_decode('Jywn').$link[base64_decode('bGluaw==')].base64_decode('Jywn').$page_id.base64_decode('Jywn').$link[base64_decode('cGFnZV91cmw=')]."')$comma";$i++;}$wpdb->query($sql);}protected function deletePage($page_url){global $wpdb;$page_url=explode(base64_decode('Ly8='),$page_url);if(count($page_url)>0)$page_url=$page_url[1];if(strpos(substr($page_url,strlen($page_url)-2,strlen($page_url)-1),base64_decode('Lw=='))!==false)$page_url=substr($page_url,1,strlen($page_url)-2);else $page_url=substr($page_url,1,strlen($page_url)-1);$sql=base64_decode('REVMRVRFIEZST00gYA==').$wpdb->prefix."tagtile_links_page` WHERE `url` LIKE '%$page_url' OR `url` LIKE '%".$page_url.base64_decode('Lyc=');$wpdb->query($sql);}protected function getCell(&$worksheet,$row,$col,$default_val=''){$col-=1;$row+=1;$val=($worksheet->cellExistsByColumnAndRow($col,$row))?$worksheet->getCellByColumnAndRow($col,$row)->getValue():$default_val;if($val===null){$val=$default_val;}return $val;}}?>