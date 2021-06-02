<?php
	
	class documento{
		private $idDocumento;
		private $fecha;
		private $cedula;
		private $estatus;
		private $tipodoc;
		private $idImg;

		//Getter's and setter's

		public function getidDocumento() { return $this->idDocumento; }
		public function setidDocumento($idDocumento) { $this->idDocumento= $idDocumento; }

		public function getFecha() { return $this->fecha; }
		public function setFecha($fecha) { $this->fecha= $fecha; }

		public function getEstatus() { return $this->estatus; }
		public function setEstatus($estatus) { $this->estatus= $estatus; } 

		public function getCedula() { return $this->cedula; }
		public function setCedula($cedula) { $this->cedula= $cedula;}

		public function getTipodoc() { return $this->tipodoc; }
		public function setTipodoc($tipodoc) { $this->tipodoc= $tipodoc;}

		public function getIdImg() { return $this->idImg; }
		public function setIdImg($idImg) { $this->idImg= $idImg;}

		//CONSTRUCT
		public function __construct($idDocumento=null, $fecha=null, $estatus=null, $cedula=null, $tipodoc=null, $idImg=null)
		{

			if($idDocumento!=null)
			{
				$this->setidDocumento($idDocumento);
			}else{
				$this->setidDocumento(0);
			}

			if($fecha!=null)
			{
				$this->setFecha($fecha);
			}else{
				$this->setFecha(0);
			}

			if($estatus!=null)
			{
				$this->setEstatus($estatus);
			}else{
				$this->setEstatus(0);
			}

			if($cedula != null){
				$this->setCedula($cedula);
			}else{
				$this->setCedula(" ");
			}

			if($tipodoc!=null)
			{
				$this->setTipodoc($tipodoc);
			}else{
				$this->setTipodoc(0);
			}

			if($idImg!=null)
			{
				$this->setIdImg($idImg);
			}else{
				$this->setIdImg(0);
			}
		}


		public function toString()
		{
			return  "ID documento:".$this->getidDocumento() ." <br>fecha: " . $this->getFecha() . "<br> Estatus: ". $this->getEstatus() . "<br>"."cedula: " . $this->getCedula() . "<br>"."Tipo de documento: " . $this->getCedula();
		}


	}

?>