"use strict"

class Computer {
    constructor(ramMemory, cpuGHz, hddMemory) {
        this.ramMemory = Number(ramMemory);
        this.cpuGHz = Number(cpuGHz);
        this.hddMemory = Number(hddMemory);
        this.taskManager = [];
        this.installedPrograms = [];
    }
    cpu_usage() {
        return this.taskManager.reduce((acc, curr) => acc + curr.cpuUsage, 0)
    }
    ram_usage() {
        return this.taskManager.reduce((acc, curr) => acc + curr.ramUsage, 0)
    }
    findInstallation(name) {
        return this.installedPrograms.find(x => x.name === name);
    }
    findProccess(name) {
        return this.taskManager.find(x => x.name === name);
    }
    handleInstall(name, requiredSpace) {
        let app = {};
        app.name = name;
        app.requiredSpace = requiredSpace;
        this.installedPrograms.push(app);
        this.hddMemory -= app.requiredSpace;
        return app;
    }
    handleOpen(app) {
        let proccess = {};
        proccess.name = app.name;
        proccess.ramUsage = Number((app.requiredSpace / this.ramMemory) * 1.5);
        proccess.cpuUsage = Number(((app.requiredSpace / this.cpuGHz) / 500) * 1.5);
        this.taskManager.push(proccess);
        if (this.ram_usage() >= 100 && this.cpu_usage() >= 100 || this.ram_usage() >= 100) {
            throw new Error(`${app.name} caused out of memory exception`)
        }
        if (this.cpu_usage() >= 100) {
            throw new Error(`${app.name} caused out of cpu exception`)
        }
        return proccess;
    }
    handleUninstall(app) {
        let appId = this.installedPrograms.findIndex(x => x.name === app.name);
        let proccessId = this.installedPrograms.findIndex(x => x.name === app.name);
        if (proccessId) {
            this.taskManager.splice(proccessId, 1);
        }
        this.hddMemory += app.requiredSpace;
        return this.installedPrograms.splice(appId, 1);
    }
    installAProgram(name, requiredSpace) {
        if (this.hddMemory < requiredSpace) {
            throw new Error("There is not enough space on the hard drive");
        }
        return this.handleInstall(name, requiredSpace);
    }
    openAProgram(input) {
        let app = this.findInstallation(input);
        if (!app) {
            throw new Error(`The ${input} is not recognized`);
        }

        let proccess = this.findProccess(app);
        if (proccess) {
            throw new Error(`The ${app.name} is already open`)
        }
        proccess = this.handleOpen(app);
        return proccess;
    }
    uninstallAProgram(input) {
        let app = this.findInstallation(input);
        if (!app) {
            throw new Error("Control panel is not responding");
        }
        this.handleUninstall(app);
        return this.installedPrograms;
    }
    taskManagerView() {
        let result = this.taskManager.reduce((msg, app) => {
            msg.push(`Name - ${app.name} | Usage - CPU: ${app.cpuUsage.toFixed(0)}%, RAM: ${app.ramUsage.toFixed(0)}%`)
            return msg;
        }, []);
        return result.length > 0 ? result.join("\n") : "All running smooth so far";
    }
}

function performance(computer) {
    console.log(`Hard Drive: ${computer.hddMemory} CPU: ${computer.cpu_usage()}%, RAM: ${computer.ram_usage()}%`);
}

let computer = new Computer(4096, 7.5, 250000);

computer.installAProgram('Word', 7300);
computer.installAProgram('Excel', 10240);
computer.installAProgram('PowerPoint', 12288);
computer.installAProgram('Solitare', 1500);

computer.openAProgram('Word');
computer.openAProgram('Excel');
computer.openAProgram('PowerPoint');
computer.openAProgram('Solitare');

computer.uninstallAProgram('Word');
computer.installAProgram('Word', 165970);
computer.openAProgram('Word');
console.log(computer);
performance(computer);
console.log(computer.taskManagerView());