# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.require_version ">= 1.7"

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.provider "virtualbox" do |v|
    v.memory = 512
  end

  # Wire up package caching:
  if Vagrant.has_plugin?("vagrant-cachier")
    config.cache.scope = :machine
  end

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/playbook.yml"
    ansible.extra_vars = { debug_mode: true }
    ansible.groups = {
      "servers" => ["server"],
      "databases" => ["database"],
    }
   end

  config.vm.define :server do |server|
    server.vm.hostname = "server.local"
    server.vm.network "private_network", ip: "172.16.0.4"
    config.vm.synced_folder "application/", "/var/www/application"
  end

  config.vm.define :database do |database|
    database.vm.hostname = "database.local"
    database.vm.network "private_network", ip: "172.16.0.6"
  end

end
