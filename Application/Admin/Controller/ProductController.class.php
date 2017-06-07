<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends Controller {
    public function index(){
		
        $this->display();
	}
	
	public function product_brand(){
		Vendor('PHPExcel.PHPExcel');
		
		$filePath = "./Public/Uploads/20170513-2017-05-13.xls";

		//建立reader对象
		$PHPReader = new \PHPExcel_Reader_Excel2007();
		if(!$PHPReader->canRead($filePath)){
			$PHPReader = new \PHPExcel_Reader_Excel5();
			if(!$PHPReader->canRead($filePath)){
				echo 'no Excel';
				return ;
			}
		}
		//建立excel对象，此时你即可以通过excel对象读取文件，也可以通过它写入文件
		$PHPExcel = $PHPReader->load($filePath);
		/**读取excel文件中的第一个工作表*/
		$currentSheet = $PHPExcel->getSheet(0);
		/**取得最大的列号*/
		$allColumn = $currentSheet->getHighestColumn();
		/**取得一共有多少行*/
		$allRow = $currentSheet->getHighestRow();
		
		$results = array();
		for($rowIndex=1;$rowIndex<=$allRow;$rowIndex++){
	
			$tmpvale = array();
			for($colIndex='A';$colIndex<=$allColumn;$colIndex++){
				$addr = $colIndex.$rowIndex;
				$cell = $currentSheet->getCell($addr)->getValue();
				if($cell instanceof PHPExcel_RichText)     //富文本转换字符串
					$cell = $cell->__toString();
					
				$tmpvale[]=$cell;
			}
			$results[] = $tmpvale;
		}
		$this->assign('results',$results);
		
       $this->display();
	}
	
	public function product_category_add(){
        $this->display();
	}
}