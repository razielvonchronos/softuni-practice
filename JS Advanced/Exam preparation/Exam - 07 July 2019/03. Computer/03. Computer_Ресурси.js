

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
    used_space() {
        return this.installedPrograms.reduce((acc, curr) => acc + curr.requiredSpace, 0);
    }
    free_space() {
        return this.hddMemory - this.used_space();
    }
    installAProgram(name, requiredSpace) {
        let app = {};
        if (this.free_space() < requiredSpace) {
            throw new Error("There is not enough space on the hard drive");
        }
        app.name = name;
        app.requiredSpace = requiredSpace
        this.installedPrograms.push(app)
        return app;
    }
    isInstalled(name) {
        return this.installedPrograms.findIndex(x => x.name === name);
    }
    isOppened(name) {
        return this.taskManager.findIndex(x => x.name === name);
    }
    openAProgram(input) {
        let i = this.isInstalled(input);
        if (i >= 0) {
            let app = this.installedPrograms[i];
            let o = this.isOppened(app.name);
            if (o >= 0) {
                throw new Error(`The ${app.name} is already open`)
            }
            let proccess = {};
            proccess.name = app.name;
            proccess.ramUsage = Number((app.requiredSpace / this.ramMemory) * 1.5);
            proccess.cpuUsage = Number(((app.requiredSpace / this.cpuGHz) / 500) * 1.5);
            if (this.ram_usage() >= 100 && this.cpu_usage() > 100 || this.ram_usage() >= 100) {
                throw new Error(`${app.name} caused out of memory exception`)
            }
            if (this.cpu_usage() >= 100) {
                throw new Error(`${app.name} caused out of cpu exception`)
            }
            this.taskManager.push(proccess);
            return proccess;
        }
        throw new Error(`The ${name} is not recognized`);
    }
    uninstallAProgram(input) {
        let i = this.isInstalled(input)
        if (i >= 0) {
            this.installedPrograms.splice(i, 1);
            return this.installedPrograms;
        }
        throw new Error("Control panel is not responding");
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
    console.log(`RAM: ${computer.ram_usage()}`);
    console.log(`CPU: ${computer.cpu_usage()}`);
    console.log(`Hard Drive: ${computer.free_space()}/${computer.used_space()}`);
}
// Zero Test - 
let computer = new Computer(13, 9.5, 250000);

// act
computer.installAProgram('Word', 7300);
computer.installAProgram('Excel', 10240);
computer.installAProgram('PowerPoint', 12288);
computer.uninstallAProgram('Word');
computer.installAProgram('Solitare', 1500);

computer.openAProgram('Excel');
computer.openAProgram('Solitare');
performance(computer)