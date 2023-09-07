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
exports.deleteCommentRouter = void 0;
const express_1 = require("express");
const comment_1 = __importDefault(require("../../models/comment"));
const post_1 = __importDefault(require("../../models/post"));
const router = (0, express_1.Router)();
exports.deleteCommentRouter = router;
router.post('/api/:postId/delete/comment/:commentId', (req, res, next) => __awaiter(void 0, void 0, void 0, function* () {
    const { postId, commentId } = req.params;
    if (!postId || !commentId)
        throw new Error('commentId is required!');
    try {
        yield comment_1.default.findOneAndRemove({ _id: commentId });
    }
    catch (err) {
        const error = new Error('cannot delete comment!');
        error.status = 500;
        next(error);
    }
    const updatedPost = yield post_1.default.findOneAndUpdate({ _id: postId }, { $pull: { comments: commentId } }, { new: true });
    res.status(201).send(updatedPost);
}));
