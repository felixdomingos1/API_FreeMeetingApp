import { Router, Request, Response, NextFunction } from "express";
import Comment from '../../models/comment'
import Post from '../../models/post'

const router = Router()

router.post('/api/:postId/delete/comment/:commentId', async (req: Request, res: Response, next: NextFunction) => {
    const { postId, commentId } = req.params;

    if(!postId || !commentId) throw new Error('commentId is required!');

    try {
        await Comment.findOneAndRemove({ _id: commentId })
    } catch(err) {
        const error = new Error('cannot delete comment!') as CustomError 
        error.status = 500
        next(error)
    }

    const updatedPost = await Post.findOneAndUpdate(
        {_id: postId}, 
        { $pull: { comments: commentId } }, 
        { new: true }
    )

    res.status(201).send(updatedPost)

})

export { router as deleteCommentRouter }