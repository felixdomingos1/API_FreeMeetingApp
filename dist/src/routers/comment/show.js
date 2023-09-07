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
exports.showCommentRouter = void 0;
const express_1 = require("express");
const comment_1 = __importDefault(require("../../models/comment"));
const router = (0, express_1.Router)();
exports.showCommentRouter = router;
router.get('/api/show/comment/:id', (req, res, next) => __awaiter(void 0, void 0, void 0, function* () {
    const { id } = req.params;
    if (!id) {
        const allComments = yield comment_1.default.find();
        res.status(200).send(allComments);
    }
    const comment = yield comment_1.default.findOne({ _id: id });
    res.status(200).send(comment);
    // const result = id ? await Post.findById(id) : await Post.find()
    // res.status(201).send(result)
}));
