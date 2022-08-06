/*This script requires nodejs and the following npm packages to run: fs, chalk. After installing nodejs and npm, the packages
 * can be installed by running these commands under the same folder Data: 
 * 1. npm install fs
 * 2. npm install chalk
 * 
 * Author: Huy Vo.
 * Date: July 16, 2022.
 * Purpose: Generate INSERT statements to populate the database given the plain data text.
 */

import * as fs from 'fs';
import chalk from 'chalk';

fs.readFile("./data.txt", (error, data) => {
    if (error) {
        throw error;
    }

    const dataString = data.toString();
    const dataSections = dataString.split("Section");

    const newDataArray = [];
    const resources = [];
    let resourceID = 0;
    let fields = ['Website: ', 'Email: ', 'Phone: ', 'Advocacy: ', 'Outreach: ', 'Programming: ', 'Community Care: ', 'Text: '];

    for (let i = 1; i < dataSections.length; i++) {
        const dataLines = dataSections[i].split('\r\n');  
        let sectionName; 
        let sectionDescription;
        let resource = {}; 
        for(let j = 0; j < dataLines.length; j++) {
            if(/ \d: (.*?)/.test(dataLines[j])) {
                sectionName = dataLines[j].split(/ \d: /)[1];
                sectionDescription = dataLines[j+2];
                continue;
            }
            if(/\d.\t(.*?)/.test(dataLines[j])) {
                if (Object.keys(resource).length !== 0) {
                    resource.Description = resource.Description.trim().replace(/\t/g, ' ');
                    resources.push(resource);
                } 
                resource = {}
                resource.id = ++resourceID;
                resource.name = dataLines[j].split(/\d.\t/)[1];
                resource.sectionName =  sectionName;
                resource.SectionID = i;
                resource.Description = "";
                continue;
            }

            let hasField = false;
            for(const field of fields) {
                if (dataLines[j].includes(field)) {
                    let attributeName = field.substring(0, field.length - 2);
                    if (attributeName == 'Community Care') {
                        attributeName = 'CommunityCare';
                    }
                    resource[attributeName] = dataLines[j].split(field)[1];
                    hasField = true;
                    break;
                }
            }

            if (hasField || resource.name === undefined) {
                continue;
            } 

            if (!resource.hasOwnProperty('Description')) {
                resource.Description = dataLines[j];
            } else {
                resource.Description += dataLines[j];
            }
                
            if (j == dataLines.length - 1) {
                resources.push(resource);
            }
        }
    }
    
    for (const resource of resources) {
        let insertQuery = "INSERT INTO `Resources ` (`ResourceName`";

        for (const property in resource) {
            if (property == "id" || property == "name" || property == "sectionName" || property == "sectionDescription") {
                continue;
            }
            insertQuery += ", `" + property + "`";
        }

        insertQuery += ") VALUES (";

        for (const property in resource) {
            if (property == "sectionName" || property == "sectionDescription" || property == "id") {
                continue;
            }

            insertQuery += `'${resource[property]}', `;
        }

        insertQuery = insertQuery.slice(0, -2);
        insertQuery += ");"
        console.log(chalk.green(insertQuery));
    }
    
})
