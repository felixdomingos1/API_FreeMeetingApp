"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const body_parser_1 = require("body-parser");
const express_1 = __importDefault(require("express"));
const mongoose_1 = __importDefault(require("mongoose"));
const app = (0, express_1.default)();
app.use((0, body_parser_1.urlencoded)({
    extended: true
}));
app.use((0, body_parser_1.json)());
const start = () => __awaiter(void 0, void 0, void 0, function* () {
    if (!process.env.Mongo_URI)
        throw new Error('Mongo_URI is require');
    try {
        yield mongoose_1.default.connect(process.env.Mongo_URI);
    }
    catch (error) {
        throw new Error("Error in yout App");
    }
    app.listen(8080, () => console.log('My Api is runnig 0n p0rt 1234'));
});
start();
