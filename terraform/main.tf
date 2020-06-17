provider "aws" {
  version = "~> 2.0"
  region  = "us-east-1"
}

resource "aws_instance" "dev" {
    count = 3
    ami = "ami-085925f297f89fce1"
    instance_type = "t2.micro"
    key_name = "terraform-aws"
    tags = {
      Name = "dev${count.index}"
    }
    vpc_security_group_ids = ["sg-0d77a126408a0f0db"]
}

resource "aws_security_group" "acesso-ssh" {
  name        = "acesso-ssh"
  description = "acesso-ssh"
 
  ingress {
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["187.181.138.99/32"]
  }

  tags = {
    Name = "ssh"
  }
}
