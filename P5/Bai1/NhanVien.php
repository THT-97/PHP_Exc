<?php
    abstract class NhanVien{
        protected $name, $gender, $dob, $dow, $kids, $smul;
        protected const bsalary = 2000000;

        function __construct($name, $gender, $dob, $dow, $kids=0, $smul=1) {
            if($kids=="") $kids = 0;
            if($smul==""||!is_numeric($smul)) $smul = 1;
            $this->name = $name;
            $this->gender = $gender;
            $this->dob = $dob;
            $this->dow = $dow;
            $this->kids = $kids;
            $this->smul = $smul;
        }
        function getName() {return $this->name;}
        function getGender() {return $this->gender;}
        function getDob() {return $this->dob;}
        function getDow() {return $this->dow;}
        function getKids() {return $this->kids;}
        function getSmul() {return $this->smul;}
        
        public abstract function TinhLuong();
        public abstract function TroCap();
        public function Thuong(){
            $d = explode("-", $this->dow);
            $today = explode("-", date("Y-M-d"));
            $y = $today[0] - $d[0];
            return $y*1000000;
        }
    }
    
    class NvVanPhong extends NhanVien{
        
        private $absence, $alimit, $fine;
        
        public function __construct($name, $gender, $dob, $dow, $kids, $smul ,$absence=0, $alimit=7, $fine=50000) {
            parent::__construct($name, $gender, $dob, $dow, $kids, $smul);
            $this->absence = $absence;
            $this->alimit = $alimit;
            $this->fine = $fine;
        }
        
        function getAbsence() {return $this->absence;}

        public function TinhLuong() {
            return ((parent::bsalary * $this->smul) - $this->Phat());
        }
        
        public function TroCap() {
            $pens = $this->kids * 200000;
            if($this->gender==1) $pens *= 1.5;
            return $pens;
        }
        
        public function Phat(){
            if($this->absence > $this->alimit) return $this->absence*$this->fine;
            return 0;
        }
    }
    
    class NvSanXuat extends NhanVien{
        private $products, $quota, $pprice;
        
        public function __construct($name, $gender, $dob, $dow, $kids, $smul ,$products=0, $quota=50, $pprice=50000) {
            parent::__construct($name, $gender, $dob, $dow, $kids, $smul);
            if($products=="") $products = 0;
            $this->products = $products;
            $this->quota = $quota;
            $this->pprice = $pprice;
        }
        function getProducts() {return $this->products;}

        public function TinhLuong() {
               return ($this->products * $this->pprice)+$this->Thuong();
        }
        public function Thuong(){
            if($this->products > $this->quota)
                return ($this->products - $this->quota) * $this->pprice * 0.03;
            return 0;
        }
        public function TroCap() {
            return $this->kids * 120000;
        }
    }
?>
<?php
    $total = "";
    $dep = ""; 
    if(isset($_POST['submit'])){
        $dep = $_POST['dep'];
        if($dep == 0){
            $nv = new NvVanPhong($_POST['name'], $_POST['gender'], $_POST['dob'], $_POST['dow'], $_POST['kids'], $_POST['smul'], $_POST['absence']);
        }
        else if($dep==1){
            $nv = new NvSanXuat($_POST['name'], $_POST['gender'], $_POST['dob'], $_POST['dow'], $_POST['kids'], $_POST['smul'], $_POST['products']);
        }
        $total = $nv->TinhLuong() + $nv->Thuong() + $nv->TroCap();
    }
?>
