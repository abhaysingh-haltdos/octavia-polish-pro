import React, { useState } from 'react';
import { MessageSquare, ThumbsUp, Send, User, CheckCircle2, ShieldCheck } from '@/site/icons';
import { BlogComment } from '../../../types/blog';

interface BlogCommentSectionProps {
  articleId: string;
}

export const BlogCommentSection: React.FC<BlogCommentSectionProps> = ({ articleId }) => {
  const [comments, setComments] = useState<BlogComment[]>([
    {
      id: 'c1',
      authorName: 'David K., Director of DevOps',
      avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=120&auto=format&fit=crop',
      date: '2 days ago',
      content: 'Excellently structured breakdown. The section comparing Staff Augmentation vs Managed Services gave us the exact clarity our leadership needed prior to our Q4 platform migration planning.',
      likes: 12,
    },
    {
      id: 'c2',
      authorName: 'Samantha Lin, Lead React Engineer',
      avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=120&auto=format&fit=crop',
      date: '1 week ago',
      content: 'We integrated two augmented frontend developers through Octavia last month — onboarding into our GitHub and Slack took under 48 hours. Really solid code quality standards.',
      likes: 8,
    },
  ]);

  const [newComment, setNewComment] = useState('');
  const [authorName, setAuthorName] = useState('');
  const [authorEmail, setAuthorEmail] = useState('');
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [submittedSuccess, setSubmittedSuccess] = useState(false);

  const handleLike = (id: string) => {
    setComments((prev) =>
      prev.map((c) => (c.id === id ? { ...c, likes: c.likes + 1 } : c))
    );
  };

  const handleSubmitComment = (e: React.FormEvent) => {
    e.preventDefault();
    if (!newComment.trim() || !authorName.trim()) return;

    setIsSubmitting(true);
    setTimeout(() => {
      const createdComment: BlogComment = {
        id: `c_${Date.now()}`,
        authorName,
        avatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=120&auto=format&fit=crop',
        date: 'Just now',
        content: newComment,
        likes: 1,
      };

      setComments([createdComment, ...comments]);
      setNewComment('');
      setAuthorName('');
      setAuthorEmail('');
      setIsSubmitting(false);
      setSubmittedSuccess(true);
      setTimeout(() => setSubmittedSuccess(false), 4000);
    }, 800);
  };

  return (
    <section className="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-8 shadow-sm my-12">
      
      {/* Header */}
      <div className="flex items-center justify-between border-b border-[#F3F5F7] pb-5">
        <h3 className="text-xl sm:text-2xl font-black text-[#264868] flex items-center gap-3">
          <MessageSquare className="w-6 h-6 text-[#C1A972]" />
          <span>Discussion & Comments ({comments.length})</span>
        </h3>
        <span className="text-xs text-[#5C6B7A] font-medium flex items-center gap-1.5">
          <ShieldCheck className="w-4 h-4 text-[#264868]" />
          <span>Enterprise Moderated</span>
        </span>
      </div>

      {/* Comment Form */}
      <div className="bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl p-5 sm:p-6 space-y-4">
        <h4 className="text-sm font-bold text-[#264868]">Leave a Comment</h4>

        {submittedSuccess ? (
          <div className="p-4 bg-[#264868]/10 border border-[#264868]/30 rounded-xl text-[#153758] text-xs font-bold flex items-center gap-2">
            <CheckCircle2 className="w-4 h-4 text-[#264868]" />
            <span>Thank you! Your comment has been published.</span>
          </div>
        ) : (
          <form onSubmit={handleSubmitComment} className="space-y-4">
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label className="text-[11px] font-bold text-[#5C6B7A] uppercase block mb-1">
                  Name / Professional Role <span className="text-[#C1A972]">*</span>
                </label>
                <input
                  type="text"
                  required
                  value={authorName}
                  onChange={(e) => setAuthorName(e.target.value)}
                  placeholder="e.g. Alex Vance, VP Engineering"
                  className="w-full bg-white border border-[#DDE3E9] focus:border-[#264868] text-[#153758] text-xs rounded-xl px-3.5 py-2.5 focus:outline-none transition-all"
                />
              </div>

              <div>
                <label className="text-[11px] font-bold text-[#5C6B7A] uppercase block mb-1">
                  Work Email <span className="text-[#93A3B2] font-normal">(Private)</span>
                </label>
                <input
                  type="email"
                  value={authorEmail}
                  onChange={(e) => setAuthorEmail(e.target.value)}
                  placeholder="alex@company.com"
                  className="w-full bg-white border border-[#DDE3E9] focus:border-[#264868] text-[#153758] text-xs rounded-xl px-3.5 py-2.5 focus:outline-none transition-all"
                />
              </div>
            </div>

            <div>
              <label className="text-[11px] font-bold text-[#5C6B7A] uppercase block mb-1">
                Your Comment <span className="text-[#C1A972]">*</span>
              </label>
              <textarea
                required
                rows={3}
                value={newComment}
                onChange={(e) => setNewComment(e.target.value)}
                placeholder="Share your technical insights, feedback, or questions..."
                className="w-full bg-white border border-[#DDE3E9] focus:border-[#264868] text-[#153758] text-xs rounded-xl p-3.5 focus:outline-none transition-all resize-y"
              />
            </div>

            <button
              type="submit"
              disabled={isSubmitting}
              className="px-6 py-2.5 bg-[#264868] hover:bg-[#153758] text-white text-xs font-bold rounded-xl transition-all shadow-md flex items-center gap-2"
            >
              {isSubmitting ? (
                <span>Publishing Comment...</span>
              ) : (
                <>
                  <Send className="w-3.5 h-3.5 text-[#C1A972]" />
                  <span>Post Comment</span>
                </>
              )}
            </button>
          </form>
        )}
      </div>

      {/* Comment List */}
      <div className="space-y-4 pt-2">
        {comments.map((comment) => (
          <div
            key={comment.id}
            className="p-5 rounded-2xl bg-white border border-[#DDE3E9] space-y-3"
          >
            <div className="flex items-center justify-between">
              <div className="flex items-center gap-3">
                <img
                  src={comment.avatar}
                  alt={comment.authorName}
                  className="w-9 h-9 rounded-full object-cover border border-[#DDE3E9]"
                />
                <div>
                  <h5 className="text-xs font-bold text-[#264868]">{comment.authorName}</h5>
                  <span className="text-[10px] text-[#93A3B2]">{comment.date}</span>
                </div>
              </div>

              <button
                onClick={() => handleLike(comment.id)}
                className="flex items-center gap-1.5 px-3 py-1 bg-[#FEFEFE] hover:bg-[#F3F5F7] border border-[#DDE3E9] text-[#5C6B7A] rounded-lg text-xs font-semibold transition-colors"
              >
                <ThumbsUp className="w-3.5 h-3.5 text-[#264868]" />
                <span>{comment.likes}</span>
              </button>
            </div>

            <p className="text-xs sm:text-sm text-[#153758] leading-relaxed font-normal">
              {comment.content}
            </p>
          </div>
        ))}
      </div>

    </section>
  );
};
