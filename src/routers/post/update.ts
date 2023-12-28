import { Router, Request, Response, NextFunction } from "express";
import Post, { IPostDocument } from '../../models/post';

interface CustomError extends Error {
    status?: number;
}

const router = Router();

router.put('/api/update/post/:id', async (req: Request, res: Response, next: NextFunction) => {
    const { title, content } = req.body;
    const { id } = req.params;

    if (!title || !content || !id) {
        const error = new Error('title, content, and id are required') as CustomError;
        error.status = 400;
        return next(error);
    }

    try {
        const newPost: IPostDocument | null = await Post.findOneAndUpdate(
            { _id: id },
            { $set: { title, content } },
            { new: true }
        );

        if (!newPost) {
            const error = new Error('Post not found') as CustomError;
            error.status = 404;
            return next(error);
        }

        res.status(201).send(newPost);
    } catch (error) {
        const customError = error as CustomError;
        customError.status = 500;
        return next(customError);
    }
});

export { router as updatePostRouter };
