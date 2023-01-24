# -*- mode: ruby -*-
# vi: set ft=ruby :

# inspired from https://github.com/geerlingguy/ansible-vagrant-examples/blob/master/lamp/Vagrantfile

# You can ask for more memory and cores when creating your Vagrant machine:
# VAGRANT_MEMORY=2048 VAGRANT_CORES=4 vagrant up
MEMORY = ENV['VAGRANT_MEMORY'] || '1024'
CORES = ENV['VAGRANT_CORES'] || '2'
VMIP = '192.168.33.64'
VMNAME = 'auvergne-webcams-master.openium.fr'
VMBOX = 'debian/bullseye64'
DEVTOOLS_ANSIBLIUM_PATH = ENV['OPENIUM_PASSWORD_STORE_DIR'] + "/../.."
ANSIBLE_PLAYBOOKS=["servers_base.yml", "webapp.yml"]

# Throw an error if required Vagrant plugins are not installed
plugins = { 'vagrant-bindfs' => nil, 'vagrant-hostsupdater' => nil }

plugins.each do |plugin, version|
  unless Vagrant.has_plugin? plugin
    error = "The '#{plugin}' plugin is not installed! Try running:\nvagrant plugin install #{plugin}"
    error += " --plugin-version #{version}" if version
    raise error
  end
end

VAGRANTFILE_API_VERSION="2"
Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.box = VMBOX

  # http://blog.theodo.fr/2017/07/speed-vagrant-synced-folders/
  config.vm.synced_folder ".", "/vagrant",  type: "nfs",
    mount_options: ['rw', 'vers=3', 'tcp'],
    linux__nfs_options: ['rw','no_subtree_check','all_squash','async']

  config.bindfs.bind_folder "/vagrant", "/vagrant-bindfs",
        u: 'vagrant',
        g: 'www-data',
        perms: 'u=rwX:g=rwX',
        o: 'nonempty'

  config.vm.provider :virtualbox do |v|
    v.name = VMNAME
    v.memory = MEMORY
    v.cpus = CORES
    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    v.customize ["modifyvm", :id, "--ioapic", "on"]
  end

  config.vm.hostname = VMNAME
  #config.vm.network :forwarded_port, guest: 80, host: 8080
  config.vm.network :private_network, ip: VMIP

  #  Set the name of the VM. See: http://stackoverflow.com/a/17864388/100134
  config.vm.define VMNAME do |vm|
  end

  config.ssh.private_key_path =  ["~/.vagrant.d/insecure_private_key","~/.ssh/id_rsa"]
  config.ssh.insert_key = false
  config.vm.provision "ssh keys", type: "shell", privileged: false do |s|
    ssh_pub_key = File.readlines("#{Dir.home}/.ssh/id_rsa.pub").first.strip
    s.inline = <<-SHELL
       echo #{ssh_pub_key} >> /home/$USER/.ssh/authorized_keys
       sudo bash -c "mkdir -p /root/.ssh ; echo #{ssh_pub_key} >> /root/.ssh/authorized_keys"
    SHELL
  end

  # Ansible provisioner.
  ANSIBLE_PLAYBOOKS.each do |playbook|
    config.vm.provision "ansible-playbook #{playbook}", type: "ansible" do |ansible|
      ansible.playbook = DEVTOOLS_ANSIBLIUM_PATH + "/" + playbook
      ansible.inventory_path = DEVTOOLS_ANSIBLIUM_PATH + "/hosts"
      ansible.config_file = DEVTOOLS_ANSIBLIUM_PATH + "/ansible.cfg"
      ansible.extra_vars = { "openium_etc_git_status_ignore": true }
      #ansible.limit = 'all'
      #ansible.verbose = "vvvv"
      #ansible.sudo = true
    end
  end
end
