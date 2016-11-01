# -*- mode: ruby -*-
# vi: set ft=ruby :

require "json"
require "./vagrant-config.rb"

Vagrant.configure(2) do |vagrant|
   
  vagrant.vm.box = "ubuntu/wily64"
    
  vagrant.vm.network "private_network", ip: Configuration["IP"]
  
  vagrant.vm.provision "shell", inline: <<-SHELL
    
    export DEBIAN_FRONTEND=noninteractive
    apt-get update
    apt-get install -y apt-transport-https ca-certificates
    apt-key adv --keyserver hkp://p80.pool.sks-keyservers.net:80 \
        --recv-keys 58118E89F3A912897C070ADBF76221572C52609D
    mkdir -p /etc/apt/sources.list.d
    echo "deb https://apt.dockerproject.org/repo ubuntu-wily main" \
        > /etc/apt/sources.list.d/docker.list
    apt-get update
    apt-get install -y docker-engine
    curl -L https://github.com/docker/compose/releases/download/1.8.1/\
docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose
    chmod +x /usr/local/bin/docker-compose
    usermod -aG docker vagrant 
    cd /vagrant && docker-compose up -d
    
  SHELL
  
end
